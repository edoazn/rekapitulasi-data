<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Pelayanan;

class PelayananPerBulanChart extends ChartWidget
{
    protected static ?string $heading = 'Rekap Pelayanan per Bulan';

    protected function getData(): array
    {
        $months = collect(range(0, 11))
            ->map(fn($i) => now()->subMonths($i)->format('Y-m'))
            ->sort()
            ->values();

        $data = Pelayanan::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as bulan, COUNT(*) as total')
            ->where('created_at', '>=', now()->subYear())
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        $values = $months->map(fn($bulan) => $data->get($bulan, 0))->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pelayanan',
                    'data' => $values,
                ],
            ],
            'labels' => $months->toArray(),
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
