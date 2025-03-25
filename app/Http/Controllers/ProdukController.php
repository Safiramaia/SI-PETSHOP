<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\KategoriProduk;
use App\Models\TransaksiProduk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $kategoriProduk = KategoriProduk::all();

        // Mengambil produk berdasarkan kategori jika ada filter
        $produks = Produk::with('kategoriProduk')
            ->when($request->kategori, function ($query) use ($request) {
                return $query->where('id_kategori', $request->kategori);
            })->get();

        return view('produk.index', compact('produks', 'kategoriProduk'));
    }

    public function filter(Request $request)
    {
        return redirect()->route('produk.index', ['kategori' => $request->kategori]);
    }

    public function addToCart(Request $request)
    {
        // Validasi permintaan yang masuk
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produkId = $request->input('produk_id');
        $jumlah = $request->input('jumlah');

        // Ambil data produk dari database
        $produk = Produk::find($produkId);

        // Cek apakah stok mencukupi
        if ($produk->stok < $jumlah) {
            return response()->json([
                'error' => 'Stok tidak mencukupi!'
            ], 400);
        }

        // Kurangi stok produk
        $produk->stok -= $jumlah;
        $produk->save();

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di keranjang, tambahkan jumlahnya
        if (isset($cart[$produkId])) {
            $cart[$produkId]['jumlah'] += $jumlah;
        } else {
            $cart[$produkId] = [
                'nama_produk' => $produk->nama_produk,
                'jumlah' => $jumlah,
                'harga_jual' => $produk->harga_jual,
                'diskon' => $produk->diskon,
                'foto' => $produk->foto,
            ];
        }

        // Simpan keranjang ke session
        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan ke keranjang!',
            'cart' => $cart,
            'product' => [
                'id' => $produkId,
                'nama_produk' => $cart[$produkId]['nama_produk'],
                'harga_jual' => $cart[$produkId]['harga_jual'],
                'jumlah' => $cart[$produkId]['jumlah'],
                'diskon' => $cart[$produkId]['diskon'],
                'foto' => asset('produk/' . $cart[$produkId]['foto']),
            ]
        ]);
    }

    public function add(Request $request)
    {
        return $this->addToCart($request);
    }

    // Metode untuk menampilkan detail produk
    public function showView($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.detail-produk', compact('produk'));
    }

    //ADMIN
    public function indexAdmin()
    {
        $produks = Produk::with('kategoriProduk')->paginate(5);
        $kategoriProduk = KategoriProduk::all();

        return view('admin.produk', compact('produks', 'kategoriProduk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori_produk,id',
            'deskripsi_produk' => 'required|string|max:255',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'diskon' => $request->diskon ?? 0,
            'stok' => $request->stok,
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('produk'), $filename);
            $produk->update(['foto' => $filename]);
        }

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori_produk,id',
            'deskripsi_produk' => 'required|string|max:255',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'diskon' => $request->diskon ?? 0,
            'stok' => $request->stok,
        ]);

        // Memeriksa apakah ada foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($produk->foto) {
                $oldFilePath = public_path('produk/' . $produk->foto);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Menyimpan foto baru
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('produk'), $filename);

            $produk->update(['foto' => $filename]);
        }

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui.');
    }

    public function showJson($id)
    {
        $produk = Produk::findOrFail($id);
        return response()->json($produk);
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
    public function getProfit($periode)
    {
        $produk = Produk::all(); 
        $totalKeuntungan = 0;

        foreach ($produk as $item) {
            $totalKeuntungan += $item->hitungKeuntunganPeriode($periode);
        }

        return response()->json(['totalKeuntungan' => $totalKeuntungan]);
    }

    //PEMBELIAN PRODUK
    public function pembelianProduk()
    {
        $transaksi = TransaksiProduk::with(['detailTransaksi.produk'])->paginate(4); 
        return view('admin.data-pembelian-produk', compact('transaksi'));
    }
}
