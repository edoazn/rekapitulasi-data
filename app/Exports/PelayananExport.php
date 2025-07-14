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

        $query = Pelayanan::with(['jenisBidangPelayanan', 'jenisBidangPelayanan.bidangPelayanan'])
            ->orderBy('tgl_pelayanan', 'desc');

        // Jika admin, tampilkan semua
        if ($user->hasRole('Admin')) {
            return $query->get();
        }

        // Jika user punya bidang_pelayanan_id, filter sesuai bidangnya
        if ($user->bidang_pelayanan_id) {
            // Filter berdasarkan relasi ke bidang pelayanan
            $query->whereHas('jenisBidangPelayanan', function ($q) use ($user) {
                $q->where('bidang_pelayanan_id', $user->bidang_pelayanan_id);
            });
        }

        return $query->get();
    }

    public function map($pelayanan): array
    {
        return [
            $pelayanan->id,
            $pelayanan->tgl_pelayanan->format('d F Y'),
            $pelayanan->jenisBidangPelayanan->bidangPelayanan->bidang_pelayanan ?? 'N/A',
            $pelayanan->jenisBidangPelayanan->nama_jenis ?? 'N/A',
            $pelayanan->jumlah_pelayanan ?? 'N/A',
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal Pelayanan',
            'Bidang Pelayanan',
            'Jenis Bidang Pelayanan',
            'Jumlah Pelayanan',
        ];
    }
}
