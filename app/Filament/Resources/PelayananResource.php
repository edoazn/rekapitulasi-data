<?php

namespace App\Filament\Resources;

use App\Exports\PelayananExport;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pelayanan;
use Filament\Tables\Table;
use App\Models\BidangPelayanan;
use Filament\Resources\Resource;
use App\Models\JenisBidangPelayanan;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PelayananResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;

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

                Forms\Components\Select::make('bidang_pelayanan_id')
                    ->label('Bidang Pelayanan')
                    ->options(BidangPelayanan::all()->pluck('bidang_pelayanan', 'id'))
                    ->reactive()
                    ->required(),

                // Select Jenis Bidang Pelayanan (cascade)
                Forms\Components\Select::make('jenis_bidang_pelayanan_id')
                    ->label('Jenis Bidang Pelayanan')
                    ->options(fn(callable $get) => JenisBidangPelayanan::where('bidang_pelayanan_id', $get('bidang_pelayanan_id'))->pluck('nama_jenis', 'id'))
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
            ])
            ->defaultSort('tgl_pelayanan', 'desc')
            ->filters([
                //
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
}
