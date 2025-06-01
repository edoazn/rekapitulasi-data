<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelayananResource\Pages;
use App\Models\Category;
use App\Models\Pelayanan;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PelayananResource extends Resource
{
    protected static ?string $model = Pelayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // card
                Forms\Components\Section::make()
                    ->schema([
                        // tanggal
                        Forms\Components\DatePicker::make('tgl_pelayanan')
                            ->label('Tanggal Pelayanan')
                            ->default(now())
                            ->displayFormat('d F Y')
                            ->required(),

                        // Category
                        Forms\Components\Select::make('parent_category_id')
                            ->label('Kategori Induk')
                            ->options(Category::whereNull('parent_id')->pluck('name', 'id'))
                            ->reactive()
                            ->required()
                            ->afterStateUpdated(fn(callable $set) => $set('category_id', null))
                            ->placeholder('Pilih Kategori Induk'),

                        // Sub Category
                        Forms\Components\Select::make('category_id')
                            ->label('Subkategori')
                            ->options(function (callable $get) {
                                $parentId = $get('parent_category_id');
                                if (!$parentId) {
                                    return [];
                                }
                                return Category::where('parent_id', $parentId)->pluck('name', 'id');
                            })
                            ->required()
                            ->placeholder('Pilih Subkategori'),

                        // User
                        Hidden::make('user_id')
                            ->default(auth()->id())
                            ->required(),
                    ])
            ]);
    }

    // eager load
    public static function getEloquentQuery(): Builder
    {
        // ambil data dengan eager loading
        $query = parent::getEloquentQuery()->with(['parentCategory', 'category', 'user']);    

        // cek apakah user memiliki role admin
        if(!auth()->user()->hasRole('Admin')) {
            // jika tidak, maka tampilkan data yang dimiliki oleh user
            $query->where('user_id', auth()->id());
        }

        return $query;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // card
                Tables\Columns\TextColumn::make('tgl_pelayanan')
                    ->label('Tanggal Pelayanan')
                    ->date('d F Y')
                    ->sortable(),
                // Kategori
                Tables\Columns\TextColumn::make('parentCategory.name')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
                // Sub kategori
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Sub kategori')
                    ->sortable()
                    ->searchable(),
               // User
               Tables\Columns\TextColumn::make('user.name')
                    ->label('Petugas')
                    ->sortable()
                    ->searchable()
                    ->visible(fn () : bool => auth()->user()->hasRole('Admin')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn () : bool => auth()->user()->hasRole('Admin')),
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
