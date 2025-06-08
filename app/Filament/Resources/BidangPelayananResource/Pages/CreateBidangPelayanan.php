<?php

namespace App\Filament\Resources\BidangPelayananResource\Pages;

use App\Filament\Resources\BidangPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBidangPelayanan extends CreateRecord
{
    protected static string $resource = BidangPelayananResource::class;

    // redirect to index
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
