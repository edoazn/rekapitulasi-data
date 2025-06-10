<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BidangPelayananResource\Pages;
use App\Models\BidangPelayanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BidangPelayananResource extends Resource
{
    protected static ?string $model = BidangPelayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Master Pelayanan';

    // admin only
    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('Admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // bidang_pelayanan
                Forms\Components\TextInput::make('bidang_pelayanan')
                    ->label('Bidang Pelayanan')
                    ->required()
                    ->unique(ignoreRecord: true),

                // keterangan
                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->nullable()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bidang_pelayanan')
                    ->label('Bidang Pelayanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->searchable(),
            ])
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
            'index' => Pages\ListBidangPelayanans::route('/'),
            'create' => Pages\CreateBidangPelayanan::route('/create'),
            'edit' => Pages\EditBidangPelayanan::route('/{record}/edit'),
        ];
    }
}
