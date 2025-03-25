<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grooming extends Model
{
    use HasFactory;
    protected $table = 'grooming';
    protected $fillable = [
        'id_user',
        'id_jenis',
        'tanggal_booking',
        'nama_kucing',
        'berat',
        'umur',
        'harga_total',
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
    public function transaksi()
    {
        return $this->hasOne(TransaksiGrooming::class, 'id_grooming');
    }
}
