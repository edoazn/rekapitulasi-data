<?php

namespace App\Filament\Resources\JenisBidangPelayananResource\Pages;

use App\Filament\Resources\JenisBidangPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisBidangPelayanan extends EditRecord
{
    protected static string $resource = JenisBidangPelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
