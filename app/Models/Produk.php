<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'harga',
        'deskripsi',
        'foto'
    ];
    
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
