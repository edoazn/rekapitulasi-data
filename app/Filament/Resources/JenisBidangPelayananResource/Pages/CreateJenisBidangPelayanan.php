<?php

namespace App\Filament\Resources\JenisBidangPelayananResource\Pages;

use App\Filament\Resources\JenisBidangPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJenisBidangPelayanan extends CreateRecord
{
    protected static string $resource = JenisBidangPelayananResource::class;


    // redirect to index page
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
