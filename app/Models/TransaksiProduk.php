<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProduk extends Model
{
    use HasFactory;
    protected $table = 'transaksi_produk';

    protected $fillable = [
        'id_user', 
        'kode_pesanan',
        'metode_pembayaran',
        'total_harga',
        'jumlah_uang',
        'kembalian',
        'tanggal_transaksi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksiProduk::class, 'id_transaksi');
    }
    
}
