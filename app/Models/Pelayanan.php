<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $fillable = ['tgl_pelayanan', 'jenis_bidang_pelayanan_id', 'jumlah_pelayanan', 'user_id'];

    protected $casts = [
        'tgl_pelayanan' => 'datetime',
    ];

    // Relasi ke JenisBidangPelayanan
    public function jenisBidangPelayanan()
    {
        return $this->belongsTo(JenisBidangPelayanan::class, 'jenis_bidang_pelayanan_id');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    
}
