<?php

namespace App\Filament\Resources\WidgetsResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalPelayananWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Stat::make(
                'Total Pelayanan',
                \App\Models\Pelayanan::count()
            )
                ->description('Jumlah total pelayanan yang telah dilakukan.')
                ->descriptionIcon('heroicon-o-document-text')
                ->chart([10, 20, 30, 40, 50])
                ->color('primary')
                ->icon('heroicon-o-document-text'),
        ];
    }
}
