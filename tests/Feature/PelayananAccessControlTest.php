<?php

namespace Tests\Feature;

use App\Models\BidangPelayanan;
use App\Models\JenisBidangPelayanan;
use App\Models\Pelayanan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PelayananAccessControlTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Petugas']);

        // Create test bidang pelayanan
        $this->bidangPelayanan1 = BidangPelayanan::create([
            'bidang_pelayanan' => 'Bidang A',
            'keterangan' => 'Test bidang A'
        ]);

        $this->bidangPelayanan2 = BidangPelayanan::create([
            'bidang_pelayanan' => 'Bidang B', 
            'keterangan' => 'Test bidang B'
        ]);

        // Create jenis bidang pelayanan
        $this->jenisBidang1 = JenisBidangPelayanan::create([
            'nama_jenis' => 'Jenis A1',
            'bidang_pelayanan_id' => $this->bidangPelayanan1->id
        ]);

        $this->jenisBidang2 = JenisBidangPelayanan::create([
            'nama_jenis' => 'Jenis B1',
            'bidang_pelayanan_id' => $this->bidangPelayanan2->id
        ]);
    }

    public function test_admin_can_see_all_pelayanan_data()
    {
        // Create admin user
        $admin = User::factory()->create(['name' => 'Admin User']);
        $admin->assignRole('Admin');

        // Create users for different bidang
        $user1 = User::factory()->create([
            'name' => 'User 1',
            'bidang_pelayanan_id' => $this->bidangPelayanan1->id
        ]);
        $user1->assignRole('Petugas');

        $user2 = User::factory()->create([
            'name' => 'User 2', 
            'bidang_pelayanan_id' => $this->bidangPelayanan2->id
        ]);
        $user2->assignRole('Petugas');

        // Create pelayanan data for each user
        $pelayanan1 = Pelayanan::create([
            'tgl_pelayanan' => '2024-01-01',
            'jumlah_pelayanan' => 10,
            'jenis_bidang_pelayanan_id' => $this->jenisBidang1->id,
            'user_id' => $user1->id
        ]);

        $pelayanan2 = Pelayanan::create([
            'tgl_pelayanan' => '2024-01-01',
            'jumlah_pelayanan' => 20,
            'jenis_bidang_pelayanan_id' => $this->jenisBidang2->id,
            'user_id' => $user2->id
        ]);

        // Act as admin and check if they can see all data
        $this->actingAs($admin);
        
        $query = \App\Filament\Resources\PelayananResource::getEloquentQuery();
        $results = $query->get();

        // Admin should see both records
        $this->assertCount(2, $results);
        $this->assertTrue($results->contains('id', $pelayanan1->id));
        $this->assertTrue($results->contains('id', $pelayanan2->id));
    }

    public function test_user_can_only_see_their_bidang_pelayanan_data()
    {
        // Create users for different bidang
        $user1 = User::factory()->create([
            'name' => 'User 1',
            'bidang_pelayanan_id' => $this->bidangPelayanan1->id
        ]);
        $user1->assignRole('Petugas');

        $user2 = User::factory()->create([
            'name' => 'User 2',
            'bidang_pelayanan_id' => $this->bidangPelayanan2->id
        ]);
        $user2->assignRole('Petugas');

        // Create pelayanan data for each user
        $pelayanan1 = Pelayanan::create([
            'tgl_pelayanan' => '2024-01-01',
            'jumlah_pelayanan' => 10,
            'jenis_bidang_pelayanan_id' => $this->jenisBidang1->id,
            'user_id' => $user1->id
        ]);

        $pelayanan2 = Pelayanan::create([
            'tgl_pelayanan' => '2024-01-01',
            'jumlah_pelayanan' => 20,
            'jenis_bidang_pelayanan_id' => $this->jenisBidang2->id,
            'user_id' => $user2->id
        ]);

        // Act as user1 and check they only see their bidang data
        $this->actingAs($user1);
        
        $query = \App\Filament\Resources\PelayananResource::getEloquentQuery();
        $results = $query->get();

        // User1 should only see pelayanan1 (their bidang)
        $this->assertCount(1, $results);
        $this->assertTrue($results->contains('id', $pelayanan1->id));
        $this->assertFalse($results->contains('id', $pelayanan2->id));
    }

    public function test_user_helper_methods_work_correctly()
    {
        // Create admin user
        $admin = User::factory()->create(['name' => 'Admin User']);
        $admin->assignRole('Admin');

        // Create regular user
        $user = User::factory()->create([
            'name' => 'Regular User',
            'bidang_pelayanan_id' => $this->bidangPelayanan1->id
        ]);
        $user->assignRole('Petugas');

        // Test isAdmin method
        $this->assertTrue($admin->isAdmin());
        $this->assertFalse($user->isAdmin());

        // Test getAllowedJenisBidangPelayanan method
        $adminAllowed = $admin->getAllowedJenisBidangPelayanan();
        $userAllowed = $user->getAllowedJenisBidangPelayanan();

        // Admin should see all jenis bidang pelayanan
        $this->assertCount(2, $adminAllowed);
        
        // User should only see jenis bidang pelayanan for their bidang
        $this->assertCount(1, $userAllowed);
        $this->assertEquals($this->jenisBidang1->id, $userAllowed->first()->id);
    }
}