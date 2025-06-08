<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisBidangPelayananResource\Pages;
use App\Filament\Resources\JenisBidangPelayananResource\RelationManagers;
use App\Models\JenisBidangPelayanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisBidangPelayananResource extends Resource
{
    protected static ?string $model = JenisBidangPelayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    // admin only
    public static function canAccess(): bool
    {
        return auth()->user()->hasRole('Admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Bidang Pelayanan
                Forms\Components\Select::make('bidang_pelayanan_id')
                    ->label('Bidang Pelayanan')
                    ->relationship('bidangPelayanan', 'bidang_pelayanan')
                    ->required(),

                // jenis_bidang_pelayanan
                Forms\Components\TextInput::make('nama_jenis')
                    ->label('Jenis Bidang Pelayanan')
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Bidang Pelayanan
                Tables\Columns\TextColumn::make('bidangPelayanan.bidang_pelayanan')
                    ->label('Bidang Pelayanan'),

                // jenis_bidang_pelayanan
                Tables\Columns\TextColumn::make('nama_jenis')
                    ->label('Jenis Bidang Pelayanan'),
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
            'index' => Pages\ListJenisBidangPelayanans::route('/'),
            'create' => Pages\CreateJenisBidangPelayanan::route('/create'),
            'edit' => Pages\EditJenisBidangPelayanan::route('/{record}/edit'),
        ];
    }
}
