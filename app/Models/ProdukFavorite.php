<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukFavorite extends Model
{
    use HasFactory;
    protected $table = 'produk_favorite';
    protected $fillable = [
        'id_user',
        'id_produk',
    ];

   public function user()
   {
       return $this->belongsTo(User::class, 'id_user');
   }

   public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
