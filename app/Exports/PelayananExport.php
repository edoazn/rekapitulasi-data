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
        return Pelayanan::with(['jenisBidangPelayanan.bidangPelayanan', 'user'])
            ->orderBy('tgl_pelayanan', 'desc')
            ->get();

    }

    public function map($pelayanan): array
    {
        return [
            $pelayanan->id,
            $pelayanan->tgl_pelayanan->format('d F Y'),
            $pelayanan->jenisBidangPelayanan->bidangPelayanan->bidang_pelayanan ?? 'N/A',
            $pelayanan->jenisBidangPelayanan->nama_jenis ?? 'N/A',
            $pelayanan->jumlah_pelayanan ?? 'N/A'
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
