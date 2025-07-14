<?php

/// Testing untuk menambahkan role id user!

namespace App\Filament\Resources\PelayananResource\Pages;

use App\Models\JenisBidangPelayanan;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PelayananResource;

class EditPelayanan extends EditRecord
{
    protected static string $resource = PelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->visible(
               function () {
                    $user = auth()->user();
                    return $user->hasRole('Admin') || $this->record->user_id === $user->id;
                }
            )
        ];
    }

    // Cek akses sebelum load halaman
    protected function authorizeAccess(): void
    {
        $user = auth()->user();
        
        // Cek apakah user bisa akses record ini
        if (!$user->hasRole('Admin') && $this->record->user_id !== $user->id) {
            Notification::make()
                ->title('Akses Ditolak')
                ->body('Anda hanya dapat mengedit data yang Anda buat sendiri.')
                ->danger()
                ->persistent()
                ->send();
            
            redirect($this->getResource()::getUrl('index'));
        }
        
        // Cek apakah jenis bidang pelayanan sesuai dengan bidang user
        if (!$user->hasRole('Admin') && $user->bidang_pelayanan_id) {
            $jenisBidang = $this->record->jenisBidangPelayanan;
            
            if ($jenisBidang && $jenisBidang->bidang_pelayanan_id !== $user->bidang_pelayanan_id) {
                Notification::make()
                    ->title('Akses Ditolak')
                    ->body('Data ini bukan dari bidang pelayanan Anda.')
                    ->danger()
                    ->persistent()
                    ->send();
                
                redirect($this->getResource()::getUrl('index'));
            }
        }
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $user = auth()->user();
        
        // Validasi tambahan untuk memastikan user hanya bisa mengedit data sesuai bidangnya
        if (!$user->hasRole('Admin')) {
            // Cek kepemilikan data
            if ($this->record->user_id !== $user->id) {
                Notification::make()
                    ->title('Akses Ditolak')
                    ->body('Anda hanya dapat mengedit data yang Anda buat sendiri.')
                    ->danger()
                    ->persistent()
                    ->send();
                
                $this->halt();
            }
            
            // Cek bidang pelayanan
            if ($user->bidang_pelayanan_id) {
                $jenisBidang = JenisBidangPelayanan::find($data['jenis_bidang_pelayanan_id']);
                
                if (!$jenisBidang || $jenisBidang->bidang_pelayanan_id !== $user->bidang_pelayanan_id) {
                    Notification::make()
                        ->title('Akses Ditolak')
                        ->body('Anda hanya dapat mengedit data untuk bidang pelayanan Anda: ' . $user->bidangPelayanan->bidang_pelayanan)
                        ->danger()
                        ->persistent()
                        ->send();
                    
                    $this->halt();
                }
            }
        }
        
        return $data;
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Data pelayanan berhasil diperbarui')
            ->body('Perubahan data telah tersimpan.');
    }
}
