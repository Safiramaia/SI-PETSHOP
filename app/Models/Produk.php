<?php

namespace App\Models;

use App\Http\Controllers\PembelianProdukController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'id_kategori',  
        'deskripsi_produk',
        'harga_beli',
        'harga_jual',
        'diskon',
        'stok',
        'foto',
    ];

    public function kategoriProduk()
    {
        return $this->belongsTo(KategoriProduk::class, 'id_kategori'); 
    }
    
    public function usersFavorited()
    {
        return $this->belongsToMany(User::class, 'produk_favorite', 'id_produk', 'id_user');
    }    

    // Fungsi untuk memeriksa apakah produk sudah difavoritkan oleh user tertentu
    public function isFavoritedByUser($userId)
    {
        return $this->usersFavorited()->where('id_user', $userId)->exists();
    }
}

