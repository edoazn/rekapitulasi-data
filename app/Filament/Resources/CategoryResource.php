<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\Builder;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    // hak akses
    public static function canAccess(): bool
    {
        return auth()->user()->hasRole('Admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // card
                Section::make()
                    ->schema([
                        // Name
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Kategori')
                            ->required()
                            ->maxLength(255),

                        // parent_id
                        Forms\Components\Select::make('parent_id')
                            ->label('Kategori Induk')
                             ->options(Category::pluck('name', 'id'))
                            ->searchable()
                            ->nullable(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }

    // eager loading
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['parent']);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Kategori Induk')
                    ->sortable()
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
