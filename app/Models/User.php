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

    // relasi ke bidang pelayanan
    public function bidangPelayanan()
    {
        return $this->belongsTo(BidangPelayanan::class);
    }

    // helper method untuk cek apakah user adalah admin
    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    // helper method untuk mendapatkan jenis bidang pelayanan yang diizinkan
    public function getAllowedJenisBidangPelayanan()
    {
        if ($this->isAdmin()) {
            return \App\Models\JenisBidangPelayanan::all();
        }

        if ($this->bidang_pelayanan_id) {
            return \App\Models\JenisBidangPelayanan::where('bidang_pelayanan_id', $this->bidang_pelayanan_id)->get();
        }

        return collect();
    }
}
