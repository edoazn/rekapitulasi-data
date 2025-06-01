<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $fillable = ['tgl_pelayanan', 'category_id', 'parent_category_id', 'user_id'];

    protected $casts = [
        'tgl_pelayanan' => 'datetime'
    ];


    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relasi ke kategori induk
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}