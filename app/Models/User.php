<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bidang_pelayanan_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // relasi ke tabel pelayanans
    public function pelayanans()
    {
        return $this->hasMany(Pelayanan::class);
    }

    // relasi ke bidang pelayanan - BARU
    public function bidangPelayanan()
    {
        return $this->belongsTo(BidangPelayanan::class, 'bidang_pelayanan_id');
    }

    // method helper untuk mendapatkan jenis bidang pelayanan yang diizinkan - BARU
    public function allowedJenisBidangPelayanan()
    {
        if (!$this->bidang_pelayanan_id) {
            return collect([]);
        }
        
        return $this->bidangPelayanan->jenisBidangPelayanan;
    }

    // // method untuk cek apakah user bisa akses bidang pelayanan tertentu - BARU
    // public function canAccessBidangPelayanan($bidangPelayananId)
    // {
    //     // Admin bisa akses semua
    //     if ($this->hasRole('Admin')) {
    //         return true;
    //     }

    //     // User hanya bisa akses bidang pelayanan mereka sendiri
    //     return $this->bidang_pelayanan_id == $bidangPelayananId;
    // }
}
