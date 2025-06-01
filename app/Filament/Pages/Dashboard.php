<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Facades\Filament;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament-panels::pages.dashboard';

    // public function getWidgets(): array
    // {
    //     return array_merge(
    //         Filament::getWidgets(),
    //         [
    //             \App\Filament\Resources\WidgetsResource\Widgets\TotalPelayananWidget::class,
    //         ]
    //     );
    // }
}
