<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiGrooming extends Model
{
    use HasFactory;

    protected $table = 'transaksi_grooming';

    protected $fillable = [
        'id_user',
        'id_grooming',
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
    public function jenisGrooming()
    {
        return $this->belongsTo(JenisGrooming::class, 'id_jenis'); 
    }

    public function grooming()
    {
        return $this->belongsTo(Grooming::class, 'id_grooming');
    }
}
