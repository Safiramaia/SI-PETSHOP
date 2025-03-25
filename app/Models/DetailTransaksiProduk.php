<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiProduk extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi_produk';
    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'nama_produk',
        'jumlah',
        'total_harga',
    ];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiProduk::class, 'id_transaksi');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk'); 
    }
}
