<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Manajemen User';

    // hak akses
    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('Admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // card
                Forms\Components\Section::make()
                    ->schema([
                        // name
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->rules('required')
                            ->placeholder('Masukkan nama lengkap')
                            ->label('Nama Lengkap')
                            ->maxLength(255),

                        // email
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->rules('required')
                            ->placeholder('Masukkan email')
                            ->label('Email')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        // password
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->rules('required')
                            ->placeholder('Masukkan password')
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create'),

                        // bidang_pelayanan_id
                        Forms\Components\Select::make('bidang_pelayanan_id')
                            ->label('Bidang Pelayanan')
                            ->relationship('bidangPelayanan', 'bidang_pelayanan')
                            ->preload()
                            ->nullable()
                            ->placeholder('Pilih bidang pelayanan'),

                        // role
                        Forms\Components\Select::make('roles')
                            ->label('Role')
                            ->relationship('roles', 'name')
                            ->preload()
                            ->required()
                            ->multiple(false),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // name
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                // email
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                // bidang_pelayanan_id
                Tables\Columns\TextColumn::make('bidangPelayanan.bidang_pelayanan')
                    ->label('Bidang Pelayanan')
                    ->sortable()
                    ->placeholder('Semua Bidang'),
                // role
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Admin' => 'success',
                        'Petugas' => 'warning',
                        default => 'gray',
                    }),
                // created_at
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // updated_at
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
            // Filter berdasarkan bidang pelayanan - BARU
                Tables\Filters\SelectFilter::make('bidang_pelayanan_id')
                    ->label('Bidang Pelayanan')
                    ->relationship('bidangPelayanan', 'bidang_pelayanan')
                    ->placeholder('Semua Bidang'),
                
                // Filter berdasarkan role - BARU
                Tables\Filters\SelectFilter::make('roles')
                    ->label('Role')
                    ->relationship('roles', 'name')
                    ->placeholder('Semua Role'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                self::resetPasswordAction(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // Reset Password Action
    public static function resetPasswordAction(): Tables\Actions\Action
    {
        return Tables\Actions\Action::make('resetPassword')
            ->label('Reset Password')
            ->icon('heroicon-o-key')
            ->form([
                Forms\Components\TextInput::make('password')
                    ->label('Password Baru')
                    ->password()
                    ->revealable()
                    ->required()
                    ->maxLength(255),
            ])
            ->action(function (User $record, array $data) {
                $record->update([
                    'password' => bcrypt($data['password']),
                ]);
            });
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    // default role
    public static function creating($record): void
    {
        $record->assignRole('Petugas');
    }
}
