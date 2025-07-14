<?php

namespace Database\Seeders;

use App\Models\BidangPelayanan;
use App\Models\JenisBidangPelayanan;
use App\Models\Pelayanan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        // 1. Buat Bidang Pelayanan
        $bidangA = BidangPelayanan::create([
            'bidang_pelayanan' => 'Kependudukan',
            'keterangan' => 'Urusan kependudukan',
        ]);
        $bidangB = BidangPelayanan::create([
            'bidang_pelayanan' => 'Perizinan',
            'keterangan' => 'Urusan perizinan',
        ]);

        // 2. Buat Jenis Bidang Pelayanan
        $jenisA1 = JenisBidangPelayanan::create([
            'nama_jenis' => 'KTP Elektronik',
            'bidang_pelayanan_id' => $bidangA->id,
        ]);
        $jenisA2 = JenisBidangPelayanan::create([
            'nama_jenis' => 'Kartu Keluarga',
            'bidang_pelayanan_id' => $bidangA->id,
        ]);
        $jenisB1 = JenisBidangPelayanan::create([
            'nama_jenis' => 'IMB',
            'bidang_pelayanan_id' => $bidangB->id,
        ]);
        $jenisB2 = JenisBidangPelayanan::create([
            'nama_jenis' => 'SIUP',
            'bidang_pelayanan_id' => $bidangB->id,
        ]);

        // 3. Buat User
        $admin = User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'bidang_pelayanan_id' => null,
        ]);
        $admin->assignRole('Admin');

        $petugasA = User::create([
            'name' => 'Petugas Kependudukan',
            'email' => 'petugas.kependudukan@example.com',
            'password' => Hash::make('password'),
            'bidang_pelayanan_id' => $bidangA->id,
        ]);
        $petugasA->assignRole('Petugas');

        $petugasB = User::create([
            'name' => 'Petugas Perizinan',
            'email' => 'petugas.perizinan@example.com',
            'password' => Hash::make('password'),
            'bidang_pelayanan_id' => $bidangB->id,
        ]);
        $petugasB->assignRole('Petugas');

        // 4. Pelayanan
        Pelayanan::create([
            'tgl_pelayanan' => now()->format('Y-m-d'),
            'jenis_bidang_pelayanan_id' => $jenisA1->id,
            'jumlah_pelayanan' => 10,
            'user_id' => $petugasA->id,
        ]);
        Pelayanan::create([
            'tgl_pelayanan' => now()->subDay()->format('Y-m-d'),
            'jenis_bidang_pelayanan_id' => $jenisA2->id,
            'jumlah_pelayanan' => 5,
            'user_id' => $petugasA->id,
        ]);
        Pelayanan::create([
            'tgl_pelayanan' => now()->format('Y-m-d'),
            'jenis_bidang_pelayanan_id' => $jenisB1->id,
            'jumlah_pelayanan' => 7,
            'user_id' => $petugasB->id,
        ]);
        Pelayanan::create([
            'tgl_pelayanan' => now()->subDays(2)->format('Y-m-d'),
            'jenis_bidang_pelayanan_id' => $jenisB2->id,
            'jumlah_pelayanan' => 4,
            'user_id' => $petugasB->id,
        ]);
    }
}
