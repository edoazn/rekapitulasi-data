<?php

namespace App\Exports;

use App\Models\Pelayanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PelayananExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        $user = auth()->user();

        // Fix: Optimized eager loading
        $query = Pelayanan::with(['jenisBidangPelayanan.bidangPelayanan'])
            ->orderBy('tgl_pelayanan', 'desc')
            ->orderBy('created_at', 'desc');

        // Jika admin, tampilkan semua 
        if ($user->hasRole('Admin')) {
            return $query->get();
        }
        
        // Jika user punya bidang_pelayanan_id, filter sesuai bidangnya
        if ($user->bidang_pelayanan_id) {
            $query->whereHas('jenisBidangPelayanan', function ($q) use ($user) {
                $q->where('bidang_pelayanan_id', $user->bidang_pelayanan_id);
            });
        }
        
        return $query->get();
    }

    public function map($pelayanan): array
    {
        // Handle jumlah pelayanan dengan lebih robust
        $jumlahPelayanan = $pelayanan->jumlah_pelayanan;
        
        // Prioritaskan pengecekan numeric dulu sebelum null check
        // Ini memastikan 0 tetap dianggap sebagai angka valid
        if (is_numeric($jumlahPelayanan)) {
            $jumlahPelayanan = (int) $jumlahPelayanan;
            // Convert ke string untuk memastikan 0 tidak hilang di Excel
            $jumlahPelayanan = (string) $jumlahPelayanan;
        } elseif (is_null($jumlahPelayanan) || $jumlahPelayanan === '') {
            $jumlahPelayanan = '-';
        } else {
            $jumlahPelayanan = '-';
        }
        
        // Handle tanggal dengan safe check
        $tanggalPelayanan = 'N/A';
        try {
            if ($pelayanan->tgl_pelayanan) {
                $tanggalPelayanan = $pelayanan->tgl_pelayanan->format('j/n/Y');
            }
        } catch (\Exception $e) {
            $tanggalPelayanan = 'N/A';
        }
        
        // Handle relasi dengan null check yang proper
        $bidangPelayanan = 'N/A';
        $jenisPelayanan = 'N/A';
        
        if ($pelayanan->jenisBidangPelayanan) {
            $jenisPelayanan = $pelayanan->jenisBidangPelayanan->nama_jenis ?? 'N/A';
            
            if ($pelayanan->jenisBidangPelayanan->bidangPelayanan) {
                $bidangPelayanan = $pelayanan->jenisBidangPelayanan->bidangPelayanan->bidang_pelayanan ?? 'N/A';
            }
        }
        
        return [
            $tanggalPelayanan,
            $bidangPelayanan,
            $jenisPelayanan,
            $jumlahPelayanan,
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal Pelayanan',
            'Bidang Pelayanan',
            'Jenis Pelayanan',
            'Jumlah Pelayanan',
        ];
    }
}
