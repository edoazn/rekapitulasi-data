<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Pelayanan;
use Filament\Widgets\Widget;
use App\Models\BidangPelayanan;
use App\Models\JenisBidangPelayanan;

class DashboardOverview extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-overview';
        protected static bool $isLazy = false;


    protected function getViewData(): array
    {
        return [
            'totalBidang' => BidangPelayanan::count(),
            'totalJenis' => JenisBidangPelayanan::count(),
            'totalPelayanan' => Pelayanan::count(),
            'totalUser' => User::count(),
        ];
    }
}
