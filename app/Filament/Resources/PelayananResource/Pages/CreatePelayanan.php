<?php

namespace App\Filament\Resources\PelayananResource\Pages;

use App\Models\JenisBidangPelayanan;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PelayananResource;

class CreatePelayanan extends CreateRecord
{
    protected static string $resource = PelayananResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->user();
        
        // Validasi tambahan untuk memastikan user hanya bisa menambah data sesuai bidangnya
        if (!$user->hasRole('Admin') && $user->bidang_pelayanan_id) {
            $jenisBidang = JenisBidangPelayanan::find($data['jenis_bidang_pelayanan_id']);
            
            if (!$jenisBidang || $jenisBidang->bidang_pelayanan_id !== $user->bidang_pelayanan_id) {
                Notification::make()
                    ->title('Akses Ditolak')
                    ->body('Anda hanya dapat menambahkan data untuk bidang pelayanan Anda: ' . $user->bidangPelayanan->bidang_pelayanan)
                    ->danger()
                    ->persistent()
                    ->send();
                
                $this->halt();
            }
        }
        
        // Pastikan user_id terisi
        $data['user_id'] = auth()->id();
        
        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Data pelayanan berhasil ditambahkan')
            ->body('Data pelayanan telah tersimpan ke dalam sistem.');
    }
}
