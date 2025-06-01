<?php

namespace App\Filament\Resources\PelayananResource\Pages;
use App\Models\Pelayanan;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Actions;
use App\Exports\PelayananExport;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PelayananResource;

class ListPelayanans extends ListRecords
{
    protected static string $resource = PelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

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
