<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();

        // Tentukan URL dashboard berdasarkan peran pengguna
        if ($user->role == 'admin') {
            $redirectUrl = route('admin.dashboard');
        } elseif ($user->role == 'karyawan') {
            $redirectUrl = route('karyawan.dashboard');
        } else {
            $redirectUrl = route('dashboard');
        }

        return view('profile.profile', compact('user', 'redirectUrl'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit-profile', compact('user'));
    }

    // Update profile pengguna
    public function updateProfile(Request $request)
    {
        // Cek apakah pengguna terautentikasi
        $user = Auth::user();

        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('profile'), $namaFoto);

            // Hapus foto lama jika ada
            if ($user->foto) {
                $oldFotoPath = public_path('profile/' . $user->foto);
                if (file_exists($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }

            // Set foto baru
            $user->foto = $namaFoto;
        }

        // Update data user
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->no_telepon = $request->no_telepon;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;

        // Simpan perubahan
        $user->save(); 

        return redirect()->route('profile.profile')->with('success', 'Profile berhasil diperbarui.');
    }

    // ADMIN
    public function indexAdmin()
    {
        $users = User::where('role', 'pelanggan')->paginate(10);

        return view('admin.data-pelanggan', compact('users'));
    }
}
