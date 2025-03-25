<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'), 
            'role' => 'admin', 
            'jenis_kelamin' =>null,
            'no_telepon' => null,
            'alamat' => null,
            'foto' => null, 
        ]);

        User::create([
            'nama' => 'Karyawan',
            'username' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'karyawan',
            'jenis_kelamin' =>null,
            'no_telepon' => null,
            'alamat' => null,
            'foto' => null, 
        ]);

        // User::create([
        //     'nama' => 'Pelanggan',
        //     'username' => 'pelanggan',
        //     'email' => 'pelanggan@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'role' => 'pelanggan',
        //     'jenis_kelamin' =>null,
        //     'no_telepon' => null,
        //     'alamat' => null,
        //     'foto' => null, 
        // ]);
    }
}
