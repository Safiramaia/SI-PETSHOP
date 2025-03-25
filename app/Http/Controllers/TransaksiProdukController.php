<?php

namespace App\Http\Controllers;

use App\Models\TransaksiProduk;
use App\Models\DetailTransaksiProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiProdukController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data order dari request
        $orderData = json_decode($request->input('orderData'), true); 

        if (!$orderData) {
            return redirect()->route('produk.index')->with('error', 'Data produk tidak ditemukan.');
        }

        // Tampilkan halaman transaksi produk
        return view('produk.transaksi-produk', compact('orderData'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_pesanan' => 'required|unique:transaksi_produk,kode_pesanan',
            'metode_pembayaran' => 'required',
            'total_harga' => 'required|numeric',
            'jumlah_uang' => 'required|numeric|min:0',
            'orderData' => 'required|json'
        ]);

        $kembalian = $request->jumlah_uang - $request->total_harga;
        $status = $request->metode_pembayaran === 'cash' ? 'completed' : 'pending';

        $transaksi = TransaksiProduk::create([
            'id_user' => Auth::id(),
            'kode_pesanan' => $request->kode_pesanan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_harga' => $request->total_harga,
            'jumlah_uang' => $request->jumlah_uang,
            'kembalian' => $kembalian,
            'status' => $status,
        ]);

        $orderData = json_decode($request->input('orderData'), true);

        if (!is_array($orderData) || empty($orderData)) {
            return response()->json(['message' => 'Order data tidak valid.'], 400);
        }

        foreach ($orderData as $item) {
            if (!isset($item['productPrice'], $item['quantity'], $item['productId'], $item['productName'])) {
                return response()->json(['message' => 'Data produk tidak lengkap.'], 400);
            }

            $totalItemPrice = $item['productPrice'] * $item['quantity'];

            DetailTransaksiProduk::create([
                'id_transaksi' => $transaksi->id,
                'id_produk' => $item['productId'],
                'nama_produk' => $item['productName'],
                'jumlah' => $item['quantity'],
                'total_harga' => $totalItemPrice,
            ]);
        }

        return response()->json(['message' => 'Transaksi berhasil disimpan!']);
    }

    //ADMIN
    public function indexAdmin()
    {
        $transaksi = TransaksiProduk::paginate(10);

        // Menghitung keuntungan
        $keuntungan = $this->hitungKeuntungan($transaksi);

        return view('admin.transaksi', compact('transaksi', 'keuntungan'));
    }

    private function hitungKeuntungan($transaksi)
    {
        $keuntungan_harian = [];
        $keuntungan_mingguan = [];
        $keuntungan_bulanan = [];

        // Tanggal saat ini
        $tanggal_sekarang = Carbon::now();

        // Loop melalui setiap transaksi
        foreach ($transaksi as $transaksi_item) {
            foreach ($transaksi_item->detailTransaksi as $detail) {
                $produk = $detail->produk;

                // Hitung harga jual setelah diskon
                $harga_jual_setelah_diskon = $produk->diskon > 0
                    ? $produk->harga_jual - ($produk->harga_jual * ($produk->diskon / 100))
                    : $produk->harga_jual;

                // Hitung keuntungan
                $keuntungan = $harga_jual_setelah_diskon - $produk->harga_beli;

                // Tambahkan keuntungan berdasarkan tanggal transaksi
                $tanggal_transaksi = Carbon::parse($transaksi_item->tanggal_transaksi);

                // Keuntungan harian
                $hari = $tanggal_transaksi->format('Y-m-d');
                $keuntungan_harian[$hari] = ($keuntungan_harian[$hari] ?? 0) + $keuntungan;

                // Keuntungan mingguan
                $minggu = $tanggal_transaksi->format('W-Y');
                $keuntungan_mingguan[$minggu] = ($keuntungan_mingguan[$minggu] ?? 0) + $keuntungan;

                // Keuntungan bulanan
                $bulan = $tanggal_transaksi->format('Y-m');
                $keuntungan_bulanan[$bulan] = ($keuntungan_bulanan[$bulan] ?? 0) + $keuntungan;
            }
        }

        return [
            'harian' => array_sum($keuntungan_harian),
            'mingguan' => array_sum($keuntungan_mingguan),
            'bulanan' => array_sum($keuntungan_bulanan),
        ];
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $transaksi = TransaksiProduk::findOrFail($id);
            $transaksi->delete();
        });

        return redirect()->route('transaksi.indexAdmin')->with('success', 'Transaksi dan detailnya berhasil dihapus.');
    }
}