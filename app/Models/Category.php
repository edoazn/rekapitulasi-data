<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = ['name', 'parent_id'];

    // Relasi ke kategori induk
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Relasi ke kategori anak
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Relasi ke pelayanan
    public function pelayanans()
    {
        return $this->hasMany(Pelayanan::class, 'category_id');
    }
}
