<?php

namespace App\Filament\Widgets;

use App\Models\BidangPelayanan;
use App\Models\JenisBidangPelayanan;
use App\Models\Pelayanan;
use App\Models\User;
use Filament\Widgets\Widget;

class DashboardOverview extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-overview';

    protected static bool $isLazy = false;

    protected function getViewData(): array
    {
        return [
            'totalBidang' => BidangPelayanan::count(),
            'totalJenis' => JenisBidangPelayanan::count(),
            // jumlah pelayanan di tabel
            'jumlahPelayanan' => Pelayanan::sum('jumlah_pelayanan'),
            'totalUser' => User::count(),
        ];
    }

    // hanya admin saja
    public static function canView(): bool
    {
        return auth()->user()->hasRole('Admin');
    }
}
