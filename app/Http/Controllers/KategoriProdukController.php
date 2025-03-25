<?php

namespace App\Http\Controllers;
use App\Models\KategoriProduk;

use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function index()
    {
        $kategoriProduk = KategoriProduk::paginate(5);
        return view('admin.kategori-produk', compact('kategoriProduk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_produk',
        ]);

        KategoriProduk::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->back()->with('success', 'Kategori Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategoriProduk = KategoriProduk::findOrFail($id);
        return view('admin.kategori-produk', compact('kategoriProduk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_produk,nama_kategori,' . $id
        ]);

        $kategoriProduk = KategoriProduk::findOrFail($id);
        $kategoriProduk->nama_kategori = $request->nama_kategori;

        $kategoriProduk->save();

        return redirect()->route('admin.kategori-produk')->with('success', 'Kategori Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategoriProduk = KategoriProduk::findOrFail($id);
        $kategoriProduk->delete();

        return redirect()->back()->with('success', 'Kategori Produk berhasil dihapus');
    }
}
