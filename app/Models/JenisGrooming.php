<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisGrooming extends Model
{
    use HasFactory;
    protected $table = 'jenis_grooming';
    protected $fillable = [
        'nama_jenis',
        'deskripsi',
        'harga',
        'foto',
        'durasi',
    ];

    public function grooming()
    {
        return $this->hasMany(Grooming::class, 'id_jenis');
    }
}
