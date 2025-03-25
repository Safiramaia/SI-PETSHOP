<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisGrooming;

class JenisGroomingController extends Controller
{
    public function index()
    {
        $jenisGrooming = JenisGrooming::paginate(5);
        return view('admin.jenis-grooming', compact('jenisGrooming'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_grooming',
            'deskripsi' => 'nullable|string|max:1000',
            'harga' => 'required|numeric',
            'durasi' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Simpan data awal tanpa foto
        $jenisGrooming = JenisGrooming::create([
            'nama_jenis' => $request->nama_jenis,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi' => $request->durasi, 
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('jenis_grooming'), $filename);
            $jenisGrooming->update(['foto' => $filename]);
        }

        return redirect()->back()->with('success', 'Jenis Grooming berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenisGrooming = JenisGrooming::findOrFail($id);
        return view('admin.jenis-grooming', compact('jenisGrooming'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_grooming,nama_jenis,' . $id,
            'deskripsi' => 'nullable|string|max:1000',
            'harga' => 'required|numeric',
            'durasi' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $jenisGrooming = JenisGrooming::findOrFail($id);
        $jenisGrooming->nama_jenis = $request->nama_jenis;
        $jenisGrooming->deskripsi = $request->deskripsi;
        $jenisGrooming->harga = number_format((float) $request->harga, 2, '.', '');
        $jenisGrooming->durasi = $request->durasi;

        // Memeriksa apakah ada foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($jenisGrooming->foto) {
                $oldFilePath = public_path('jenis_grooming/' . $jenisGrooming->foto);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Menyimpan foto baru
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('jenis_grooming'), $filename);

            $jenisGrooming->update(['foto' => $filename]);
        }

        $jenisGrooming->save();

        return redirect()->route('admin.jenis-grooming')->with('success', 'Jenis grooming berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenisGrooming = JenisGrooming::findOrFail($id);
        $jenisGrooming->delete();

        return redirect()->back()->with('success', 'Jenis Grooming berhasil dihapus');
    }
}

