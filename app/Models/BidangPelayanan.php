<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangPelayanan extends Model
{
    protected $fillable = ['bidang_pelayanan', 'keterangan'];

    // Relasi ke jenis bidang pelayanan
    public function jenisBidangPelayanan()
    {
        return $this->hasMany(JenisBidangPelayanan::class, 'bidang_pelayanan_id');
    }
}
