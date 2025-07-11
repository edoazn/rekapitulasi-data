<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelayananResource\Pages;
use App\Models\BidangPelayanan;
use App\Models\JenisBidangPelayanan;
use App\Models\Pelayanan;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PelayananResource extends Resource
{
    protected static ?string $model = Pelayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?string $navigationGroup = 'Data Pelayanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // tanggal pelayanan
                Forms\Components\DatePicker::make('tgl_pelayanan')
                    ->label('Tanggal Pelayanan')
                    ->default(now())
                    ->native(false)
                    ->displayFormat('d F Y')
                    ->required(),

                // Bidang Pelayanan
                Forms\Components\Select::make('bidang_pelayanan_id')
                    ->label('Bidang Pelayanan')
                    ->options(function () {
                        $user = auth()->user();
                        if ($user->hasRole('Admin')) {
                            return BidangPelayanan::all()->pluck('bidang_pelayanan', 'id');
                        }
                        
                        if ($user->bidang_pelayanan_id) {
                            return BidangPelayanan::where('id', $user->bidang_pelayanan_id)->pluck('bidang_pelayanan', 'id');
                        }
                        
                        return [];
                    })
                    ->default(function () {
                        $user = auth()->user();
                        return $user->hasRole('Admin') ? null : $user->bidang_pelayanan_id;
                    })
                    ->reactive()
                    ->required(),

                // Jenis Bidang Pelayanan
                Forms\Components\Select::make('jenis_bidang_pelayanan_id')
                    ->label('Jenis Bidang Pelayanan')
                    ->options(fn (callable $get) => JenisBidangPelayanan::where('bidang_pelayanan_id', $get('bidang_pelayanan_id'))->pluck('nama_jenis', 'id'))
                    ->required()
                    ->reactive(),

                // jumlah
                Forms\Components\TextInput::make('jumlah_pelayanan')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),

                // hide user_id
                Hidden::make('user_id')
                    ->default(auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // tanggal pelayanan
                Tables\Columns\TextColumn::make('tgl_pelayanan')
                    ->label('Tanggal Pelayanan')
                    ->date('d F Y')
                    // ->displayFormat('d F Y')
                    ->sortable(),

                // Bidang Pelayanan
                Tables\Columns\TextColumn::make('jenisBidangPelayanan.bidangPelayanan.bidang_pelayanan')
                    ->label('Bidang Pelayanan'),

                // jenis_bidang_pelayanan
                Tables\Columns\TextColumn::make('jenisBidangPelayanan.nama_jenis')
                    ->label('Jenis Bidang Pelayanan'),

                // jumlah
                Tables\Columns\TextColumn::make('jumlah_pelayanan')
                    ->label('Jumlah'),

                // dibuat oleh
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Dibuat Oleh')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('tgl_pelayanan', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn ($record) => auth()->user()->hasRole('Admin') || $record->user_id === auth()->id()),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn ($record) => auth()->user()->hasRole('Admin') || $record->user_id === auth()->id()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function ($records) {
                            $user = auth()->user();
                            foreach ($records as $record) {
                                if ($user->hasRole('Admin') || $record->user_id === $user->id) {
                                    $record->delete();
                                }
                            }
                        }),
                ]),
            ]);
    }

    // Query scoping untuk hak akses
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        // Admin dapat melihat semua data
        if ($user->hasRole('Admin')) {
            return $query;
        }

        // User hanya bisa melihat data dari bidang pelayanan mereka
        if ($user->bidang_pelayanan_id) {
            return $query->whereHas('jenisBidangPelayanan', function ($q) use ($user) {
                $q->where('bidang_pelayanan_id', $user->bidang_pelayanan_id);
            });
        }

        // Jika user tidak memiliki bidang pelayanan, tidak ada data yang ditampilkan
        return $query->where('id', null);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPelayanans::route('/'),
            'create' => Pages\CreatePelayanan::route('/create'),
            'edit' => Pages\EditPelayanan::route('/{record}/edit'),
        ];
    }
}
