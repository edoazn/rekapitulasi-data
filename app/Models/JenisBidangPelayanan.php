<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBidangPelayanan extends Model
{
    protected $fillable = ['nama_jenis', 'bidang_pelayanan_id'];

    // Relasi ke bidang pelayanan
    public function bidangPelayanan()
    {
        return $this->belongsTo(BidangPelayanan::class, 'bidang_pelayanan_id');
    }
}
