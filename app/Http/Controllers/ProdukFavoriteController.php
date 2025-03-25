<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukFavoriteController extends Controller
{
    public function store(Produk $produk)
    {
        // Cek jika produk sudah ada di favorit
        $exists = ProdukFavorite::where('id_user', Auth::id())
            ->where('id_produk', $produk->id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Produk sudah ada di favorit');
        }

        ProdukFavorite::create([
            'id_user' => Auth::id(),
            'id_produk' => $produk->id,
        ]);

        return redirect()->back()->with('toast_success', 'Produk berhasil ditambahkan ke favorit');
    }

    public function destroy(Produk $produk)
    {
        // Hapus produk dari favorit
        ProdukFavorite::where('id_user', Auth::id())
            ->where('id_produk', $produk->id)
            ->delete();

        return redirect()->back()->with('toast_success', 'Produk berhasil dihapus dari favorit');
    }
}
