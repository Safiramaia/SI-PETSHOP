<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'username',
        'role',
        'email',
        'password',
        'jenis_kelamin',
        'no_telepon',
        'alamat',
        'foto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function grooming()
    {
        return $this->hasMany(Grooming::class, 'id_user');
    }
    public function transaksi()
    {
        return $this->hasMany(TransaksiProduk::class, 'id_user');
    }
    public function favoriteProducts()
    {
        return $this->belongsToMany(Produk::class, 'produk_favorite', 'id_user', 'id_produk');
    }    
}

