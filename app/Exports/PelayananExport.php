<?php

namespace App\Exports;

use App\Models\Pelayanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; // <--- PENTING untuk Header
use Maatwebsite\Excel\Concerns\WithMapping;  // <--- PENTING untuk mengubah ID jadi Nama
use Illuminate\Support\Collection;

// Pastikan class ini meng-implement WithHeadings dan WithMapping
class PelayananExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Ambil query dasar dengan relasi yang dibutuhkan untuk efisiensi
        $query = Pelayanan::with(['parentCategory', 'category', 'user']);

        // Terapkan logika keamanan yang sama seperti di tabel Filament
        if (!auth()->user()->hasRole('Admin')) {
            // Jika bukan admin, hanya ambil data milik sendiri
            $query->where('user_id', auth()->id());
        }

        return $query->get();
    }

    /**
     * INI ADALAH SOLUSI UNTUK MENGUBAH ID MENJADI NAMA
     * Method ini akan berjalan untuk setiap baris data.
     *
     * @param mixed $pelayanan Model Pelayanan untuk setiap baris
     * @return array
     */
    public function map($pelayanan): array
    {
        // Kita membuat array secara manual untuk setiap baris di Excel
        return [
            $pelayanan->id,
            $pelayanan->tgl_pelayanan->format('d F Y'), // Format tanggal
            $pelayanan->parentCategory->name ?? 'N/A', // Ambil nama dari relasi parentCategory
            $pelayanan->category->name ?? 'N/A',       // Ambil nama dari relasi category
            $pelayanan->user->name ?? 'N/A',           // Ambil nama dari relasi user
        ];
    }

    /**
     * INI ADALAH SOLUSI UNTUK HEADER YANG HILANG
     * Method ini akan membuat baris pertama (header) di file Excel Anda.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Tanggal Pelayanan',
            'Kategori',
            'Subkategori',
            'Nama Petugas',
        ];
    }
}