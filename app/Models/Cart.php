<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_produk',
        'kuatitas',
    ];

    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
