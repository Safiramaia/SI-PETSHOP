<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiGrooming;
use App\Models\Grooming;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiGroomingController extends Controller
{
    public function show($id)
    {
        $grooming = Grooming::with('jenisGrooming')
            ->where('id', $id)
            ->where('status', 'payment')
            ->first();

        if (!$grooming) {
            return redirect()->route('grooming.index')->with('error', 'Grooming tidak ditemukan atau belum selesai.');
        }

        return view('grooming.transaksi-grooming', compact('grooming'));
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'metode_pembayaran' => 'required|string',
            'jumlah_uang' => 'required|numeric|min:0',
            'kembalian' => 'nullable|numeric',
        ]);

        $grooming = Grooming::findOrFail($id);
        if ($request->jumlah_uang < $grooming->harga_total) {
            return response()->json(['error' => 'Jumlah uang tidak mencukupi'], 400);
        }

        // Membuat transaksi grooming baru
        $transaksi_grooming = new TransaksiGrooming();
        $transaksi_grooming->id_user = Auth::id();
        $transaksi_grooming->id_grooming = $grooming->id;
        $transaksi_grooming->metode_pembayaran = $validated['metode_pembayaran'];
        $transaksi_grooming->total_harga = $grooming->harga_total;
        $transaksi_grooming->jumlah_uang = $validated['jumlah_uang'];
        $transaksi_grooming->kembalian = $validated['kembalian'] ?? 0;

        // Tentukan status transaksi grooming berdasarkan metode pembayaran
        if ($validated['metode_pembayaran'] === 'cash') {
            $transaksi_grooming->status = 'completed';
        } else {
            $transaksi_grooming->status = 'pending';
        }

        if ($transaksi_grooming->save()) {
            $grooming->status = 'selesai'; 
            $grooming->save();

            return response()->json(['toast_succes' => 'Transaksi berhasil disimpan!']);
        }

        return response()->json(['error' => 'Terjadi kesalahan saat menyimpan transaksi'], 500);
    }

    //ADMIN
    public function indexAdmin()
    {
        $transaksi_grooming = TransaksiGrooming::paginate(10);

        return view('admin.grooming-transaksi', compact('transaksi_grooming'));
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $transaksi_grooming = TransaksiGrooming::findOrFail($id);
            $transaksi_grooming->delete();
        });

        return redirect()->route('admin.grooming-transaksi')->with('success', 'Transaksi grooming berhasil dihapus.');
    }

}
