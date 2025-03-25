<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\TransaksiProduk;
use App\Models\ProdukFavorite;
use App\Models\Grooming;
use App\Models\JenisGrooming;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $favoriteProducts = $user->favoriteProducts;
        return view('dashboard', compact('user', 'favoriteProducts'));
    }

    public function adminIndex()
    {
        // Ambil semua transaksi dalam satu bulan terakhir
        $transaksi = TransaksiProduk::with('detailTransaksi.produk')
            ->where('tanggal_transaksi', '>=', Carbon::now()->subMonth())
            ->get();

        // Hitung keuntungan berdasarkan transaksi
        $keuntungan = $this->hitungKeuntungan($transaksi);
        $labels_harian = array_keys($keuntungan['harian']);
        $labels_mingguan = array_keys($keuntungan['mingguan']);
        $labels_bulanan = array_keys($keuntungan['bulanan']);

        // Ambil produk yang paling banyak difavoritkan oleh pengguna
        $produkFavorit = ProdukFavorite::select('id_produk', DB::raw('count(*) as total_favorit'))
            ->groupBy('id_produk')
            ->orderByDesc('total_favorit')
            ->limit(5) 
            ->get();

        // Ambil nama produk untuk pie chart
        $produkNames = Produk::whereIn('id', $produkFavorit->pluck('id_produk'))
            ->pluck('nama_produk', 'id');

        // Ambil grooming terlaris berdasarkan jumlah booking
        $groomingTerlaris = Grooming::select('id_jenis', DB::raw('count(*) as jumlah'))
            ->where('status', 'Selesai')
            ->groupBy('id_jenis')
            ->orderByDesc('jumlah')
            ->limit(5)
            ->get();

        // Ambil nama jenis grooming untuk chart
        $jenisGroomingNames = JenisGrooming::whereIn('id', $groomingTerlaris->pluck('id_jenis'))
            ->pluck('nama_jenis', 'id');

        // Hitung total transaksi produk yang selesai
        $totalTransaksiProduk = TransaksiProduk::where('status', 'completed')->count();

        // Hitung total grooming yang menunggu
        $totalGrooming = Grooming::where('status', 'menunggu')->count();

        // Hitung total pengguna dengan role 'pelanggan'
        $totalPengguna = User::where('role', 'pelanggan')->count();


        // Gabungkan semua data yang diperlukan untuk view
        return view('admin.dashboard', compact(
            'keuntungan',
            'labels_harian',
            'labels_mingguan',
            'labels_bulanan',
            'produkFavorit',
            'produkNames',
            'groomingTerlaris',
            'jenisGroomingNames',
            'totalGrooming',
            'totalPengguna',
            'totalTransaksiProduk'
        ));
    }
    
    private function hitungKeuntungan($transaksi)
    {
        $keuntungan_harian = [];
        $keuntungan_mingguan = [];
        $keuntungan_bulanan = [];

        foreach ($transaksi as $transaksi_item) {
            foreach ($transaksi_item->detailTransaksi as $detail) {
                $produk = $detail->produk;

                // Hitung harga jual setelah diskon
                $harga_jual_setelah_diskon = $produk->diskon > 0
                    ? $produk->harga_jual - ($produk->harga_jual * ($produk->diskon / 100))
                    : $produk->harga_jual;

                // Hitung keuntungan
                $keuntungan = $harga_jual_setelah_diskon - $produk->harga_beli;

                // Dapatkan tanggal transaksi
                $tanggal_transaksi = Carbon::parse($transaksi_item->tanggal_transaksi);

                // Keuntungan harian
                $hari_key = $tanggal_transaksi->format('Y-m-d');
                $keuntungan_harian[$hari_key] = ($keuntungan_harian[$hari_key] ?? 0) + $keuntungan;

                // Keuntungan mingguan (dari minggu awal setiap transaksi)
                $minggu_key = $tanggal_transaksi->startOfWeek()->format('Y-m-d');
                $keuntungan_mingguan[$minggu_key] = ($keuntungan_mingguan[$minggu_key] ?? 0) + $keuntungan;

                // Keuntungan bulanan (hanya tahun 2024)
                if ($tanggal_transaksi->year == 2024) {
                    $bulan_key = $tanggal_transaksi->format('Y-m');
                    $keuntungan_bulanan[$bulan_key] = ($keuntungan_bulanan[$bulan_key] ?? 0) + $keuntungan;
                }
            }
        }

        $keuntungan_harian = $this->ambil7HariTerakhir($keuntungan_harian);
        $keuntungan_mingguan = $this->ambilMingguTerakhir($keuntungan_mingguan);
        $keuntungan_bulanan = $this->ambilDataTahun2024($keuntungan_bulanan);

        return [
            'harian' => $keuntungan_harian,
            'mingguan' => $keuntungan_mingguan,
            'bulanan' => $keuntungan_bulanan,
        ];
    }

    private function ambil7HariTerakhir($data)
    {
        $result = [];
        $start = Carbon::now()->subDays(6);
        $end = Carbon::now();

        while ($start <= $end) {
            $key = $start->format('Y-m-d');
            $result[$key] = $data[$key] ?? 0;
            $start->addDay();
        }

        return $result;
    }

    // Ambil minggu dalam 1 bulan terakhir saja
    private function ambilMingguTerakhir($data)
    {
        $result = [];
        $start = Carbon::now()->subMonth()->startOfWeek();
        $end = Carbon::now()->endOfWeek();

        while ($start <= $end) {
            $key = $start->format('Y-m-d');
            $result[$key] = $data[$key] ?? 0;
            $start->addWeek();
        }

        return $result;
    }

    // Ambil data bulanan dari tahun 2024 saja
    private function ambilDataTahun2024($data)
    {
        $result = [];
        $start = Carbon::create(2024, 1, 1)->startOfMonth();
        $end = Carbon::create(2024, 12, 31)->endOfMonth();

        while ($start <= $end) {
            $key = $start->format('Y-m');
            $result[$key] = $data[$key] ?? 0;
            $start->addMonth();
        }

        return $result;
    }

    public function karyawanIndex()
    {
        return view('karyawan.dashboard');
    }
}
