<?php

namespace Database\Seeders;

use App\Models\BidangPelayanan;
use App\Models\JenisBidangPelayanan;
use App\Models\Pelayanan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles if they don't exist
        if (!Role::where('name', 'Admin')->exists()) {
            Role::create(['name' => 'Admin']);
        }
        if (!Role::where('name', 'Petugas')->exists()) {
            Role::create(['name' => 'Petugas']);
        }

        // Create bidang pelayanan
        $bidangA = BidangPelayanan::firstOrCreate([
            'bidang_pelayanan' => 'Pelayanan Umum'
        ], [
            'keterangan' => 'Bidang pelayanan umum untuk masyarakat'
        ]);

        $bidangB = BidangPelayanan::firstOrCreate([
            'bidang_pelayanan' => 'Pelayanan Kesehatan'
        ], [
            'keterangan' => 'Bidang pelayanan kesehatan masyarakat'
        ]);

        // Create jenis bidang pelayanan
        $jenisA1 = JenisBidangPelayanan::firstOrCreate([
            'nama_jenis' => 'Surat Keterangan',
            'bidang_pelayanan_id' => $bidangA->id
        ]);

        $jenisA2 = JenisBidangPelayanan::firstOrCreate([
            'nama_jenis' => 'Administrasi KTP',
            'bidang_pelayanan_id' => $bidangA->id
        ]);

        $jenisB1 = JenisBidangPelayanan::firstOrCreate([
            'nama_jenis' => 'Pemeriksaan Umum',
            'bidang_pelayanan_id' => $bidangB->id
        ]);

        $jenisB2 = JenisBidangPelayanan::firstOrCreate([
            'nama_jenis' => 'Vaksinasi',
            'bidang_pelayanan_id' => $bidangB->id
        ]);

        // Create admin user
        $admin = User::firstOrCreate([
            'email' => 'admin@demo.com'
        ], [
            'name' => 'Administrator',
            'password' => bcrypt('password'),
            'bidang_pelayanan_id' => null
        ]);
        $admin->assignRole('Admin');

        // Create user for Pelayanan Umum
        $userUmum = User::firstOrCreate([
            'email' => 'petugas.umum@demo.com'
        ], [
            'name' => 'Petugas Pelayanan Umum',
            'password' => bcrypt('password'),
            'bidang_pelayanan_id' => $bidangA->id
        ]);
        $userUmum->assignRole('Petugas');

        // Create user for Pelayanan Kesehatan
        $userKesehatan = User::firstOrCreate([
            'email' => 'petugas.kesehatan@demo.com'
        ], [
            'name' => 'Petugas Pelayanan Kesehatan',
            'password' => bcrypt('password'),
            'bidang_pelayanan_id' => $bidangB->id
        ]);
        $userKesehatan->assignRole('Petugas');

        // Create sample pelayanan data
        Pelayanan::firstOrCreate([
            'tgl_pelayanan' => '2024-01-15',
            'jenis_bidang_pelayanan_id' => $jenisA1->id,
            'user_id' => $userUmum->id
        ], [
            'jumlah_pelayanan' => 25
        ]);

        Pelayanan::firstOrCreate([
            'tgl_pelayanan' => '2024-01-15',
            'jenis_bidang_pelayanan_id' => $jenisA2->id,
            'user_id' => $userUmum->id
        ], [
            'jumlah_pelayanan' => 15
        ]);

        Pelayanan::firstOrCreate([
            'tgl_pelayanan' => '2024-01-15',
            'jenis_bidang_pelayanan_id' => $jenisB1->id,
            'user_id' => $userKesehatan->id
        ], [
            'jumlah_pelayanan' => 40
        ]);

        Pelayanan::firstOrCreate([
            'tgl_pelayanan' => '2024-01-15',
            'jenis_bidang_pelayanan_id' => $jenisB2->id,
            'user_id' => $userKesehatan->id
        ], [
            'jumlah_pelayanan' => 30
        ]);
    }
}