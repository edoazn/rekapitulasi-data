<?php

namespace App\Filament\Resources\PelayananResource\Pages;

use App\Filament\Resources\PelayananResource;
use Filament\Actions;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelayananExport;
use Filament\Resources\Pages\ListRecords;

class ListPelayanans extends ListRecords
{
    protected static string $resource = PelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            // Export excel
            // import excel
            Actions\Action::make('export')
            ->label('Export Excel')
            ->icon('heroicon-o-document-arrow-down')
            ->color('success')
            ->action(function () {
                // Ketika diklik, panggil class Export yang sudah kita buat
                // dan tentukan nama file yang akan diunduh.
                return Excel::download(new PelayananExport, 'laporan-pelayanan-' . now()->format('d-m-Y') . '.xlsx');
            })
            // Terapkan hak akses: hanya Admin yang bisa melihat tombol ini
            // ->visible(fn (): bool => auth()->user()->hasRole('Admin')),
        ];
    }
}
