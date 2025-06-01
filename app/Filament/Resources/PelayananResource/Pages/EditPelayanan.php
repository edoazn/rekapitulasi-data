<?php

namespace App\Filament\Resources\PelayananResource\Pages;

use App\Filament\Resources\PelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPelayanan extends EditRecord
{
    protected static string $resource = PelayananResource::class;

    protected function getHeaderActions(): array
    {
       // cek role
       if (auth()->user()->hasRole('Admin')) {
        return [
            Actions\DeleteAction::make(),
        ];
       } else {
        return [];
       }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
