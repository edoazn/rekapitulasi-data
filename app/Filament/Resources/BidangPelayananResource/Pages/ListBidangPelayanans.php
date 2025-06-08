<?php

namespace App\Filament\Resources\BidangPelayananResource\Pages;

use App\Filament\Resources\BidangPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangPelayanans extends ListRecords
{
    protected static string $resource = BidangPelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
