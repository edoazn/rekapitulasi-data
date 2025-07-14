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
use Illuminate\Database\Eloquent\Builder;

class PelayananResource extends Resource
{
    protected static ?string $model = Pelayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?string $navigationGroup = 'Data Pelayanan';

    public static function form(Form $form): Form
    {
        $user = auth()->user();

        return $form
            ->schema([
                // tanggal pelayanan
                Forms\Components\DatePicker::make('tgl_pelayanan')
                    ->label('Tanggal Pelayanan')
                    ->default(now())
                    ->native(false)
                    ->displayFormat('d F Y')
                    ->required(),

                // Bidang Pelayanan (readonly jika user memiliki bidang pelayanan tertentu)
                Forms\Components\Select::make('bidang_pelayanan_id')
                    ->label('Bidang Pelayanan')
                    ->options(function () use ($user) {
                        // Admin bisa pilih semua bidang
                        if ($user->hasRole('Admin')) {
                            return BidangPelayanan::all()->pluck('bidang_pelayanan', 'id');
                        }

                        // User petugas hanya bisa pilih bidang mereka sendiri
                        if ($user->bidang_pelayanan_id) {
                            return BidangPelayanan::where('id', $user->bidang_pelayanan_id)
                                ->pluck('bidang_pelayanan', 'id');
                        }

                        // Jika user tidak punya bidang, tidak bisa pilih apapun
                        return [];
                    })
                    ->default($user->bidang_pelayanan_id)
                    ->disabled(function () use ($user) {
                        // Disabled jika bukan admin dan user punya bidang pelayanan tertentu
                        return !$user->hasRole('Admin') && $user->bidang_pelayanan_id;
                    })
                    ->reactive()
                    ->required()
                    ->helperText(function () use ($user) {
                        if (!$user->hasRole('Admin') && $user->bidang_pelayanan_id) {
                            return 'Anda hanya dapat menambah data untuk bidang pelayanan Anda.';
                        }
                        return null;
                    }),

                // Jenis Bidang Pelayanan (dibatasi berdasarkan bidang pelayanan user)
                Forms\Components\Select::make('jenis_bidang_pelayanan_id')
                    ->label('Jenis Bidang Pelayanan')
                    ->options(function () {
                        $user = auth()->user();
                        if ($user->bidang_pelayanan_id) {
                            return JenisBidangPelayanan::where('bidang_pelayanan_id', $user->bidang_pelayanan_id)
                                ->pluck('nama_jenis', 'id');
                        }
                        return JenisBidangPelayanan::pluck('nama_jenis', 'id');
                    })
                    ->required()
                    ->searchable(),

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

                // Bidang Pelayanan sesuai dengan bidang pelayanan user
                Tables\Columns\TextColumn::make('jenisBidangPelayanan.bidangPelayanan.bidang_pelayanan')
                    ->label('Bidang Pelayanan'),

                // jenis_bidang_pelayanan
                Tables\Columns\TextColumn::make('jenisBidangPelayanan.nama_jenis')
                    ->label('Jenis Bidang Pelayanan'),

                // jumlah
                Tables\Columns\TextColumn::make('jumlah_pelayanan')
                    ->label('Jumlah')
                    ->sortable(),
            ])
            ->defaultSort('tgl_pelayanan', 'desc')
            ->filters([
                // Filter Jenis Bidang Pelayanan (hanya yang sesuai bidang user)
                Tables\Filters\SelectFilter::make('jenis_bidang_pelayanan_id')
                    ->label('Jenis Bidang')
                    ->options(function () {
                        $user = auth()->user();
                        if ($user->hasRole('Admin')) {
                            return JenisBidangPelayanan::pluck('nama_jenis', 'id');
                        }
                        if ($user->bidang_pelayanan_id) {
                            return JenisBidangPelayanan::where('bidang_pelayanan_id', $user->bidang_pelayanan_id)
                                ->pluck('nama_jenis', 'id');
                        }
                        return [];
                    }),

                // Filter Tanggal Pelayanan
                Tables\Filters\Filter::make('tgl_pelayanan')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('Dari'),
                        Forms\Components\DatePicker::make('to')
                            ->label('Sampai'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q, $date) => $q->whereDate('tgl_pelayanan', '>=', $date))
                            ->when($data['to'], fn($q, $date) => $q->whereDate('tgl_pelayanan', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        // Jika Admin, tampilkan semua
        if ($user->hasRole('Admin')) {
            return $query;
        }

        // Jika Petugas, hanya tampilkan data pelayanan sesuai bidang user
        if ($user->bidang_pelayanan_id) {
            return $query->whereHas('jenisBidangPelayanan', function ($q) use ($user) {
                $q->where('bidang_pelayanan_id', $user->bidang_pelayanan_id);
            });
        }

        // Jika tidak punya bidang, kosongkan
        return $query->whereRaw('0 = 1');
    }
}
