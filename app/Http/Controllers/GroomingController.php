<?php

namespace App\Http\Controllers;

use App\Models\Grooming;
use App\Models\JenisGrooming;
use App\Models\TransaksiGrooming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroomingController extends Controller
{
    public function index()
    {
        // Ambil grooming yang hanya terkait dengan user yang login
        $grooming = Grooming::with('jenisGrooming')
            ->where('id_user', Auth::id())
            ->get();

        $jenisGrooming = JenisGrooming::all();

        return view('grooming.index', compact('grooming', 'jenisGrooming'));
    }

    public function create(Request $request)
    {
        $jenisGrooming = JenisGrooming::all();
        $selectedJenisId = $request->query('jenis_id');
        $durasi = $request->query('durasi');

        return view('grooming.booking-grooming', compact('jenisGrooming', 'selectedJenisId', 'durasi'));
    }

    public function store(Request $request)
    {

        // Validasi data
        $validatedData = $request->validate([
            'id_jenis' => 'required|exists:jenis_grooming,id',
            'tanggal_booking' => 'required|date',
            'nama_kucing' => 'required|string|max:255',
            'umur' => 'required|numeric|min:0',
            'berat' => 'required|numeric|min:0',
        ]);

        $jenisGrooming = JenisGrooming::find($validatedData['id_jenis']);
        $hargaDasar = $jenisGrooming->harga;

        // Hitung total harga berdasarkan berat dan aturan yang ditetapkan
        $berat = $validatedData['berat'];
        $hargaTotal = $hargaDasar;

        if ($berat > 5) {
            $tambahanKg = $berat - 5;
            $hargaTotal += $tambahanKg * $hargaDasar * 0.1; // tambahan untuk setiap kg nya dari 10%
        }

        $grooming = new Grooming();
        $grooming->id_user = Auth::id();
        $grooming->id_jenis = $validatedData['id_jenis'];
        $grooming->tanggal_booking = $validatedData['tanggal_booking'];
        $grooming->nama_kucing = $validatedData['nama_kucing'];
        $grooming->umur = $validatedData['umur'];
        $grooming->berat = $validatedData['berat'];
        $grooming->harga_total = $hargaTotal;
        $grooming->status = 'menunggu';
        $grooming->save();

        return redirect()->route('grooming.index')->with('status', 'Booking grooming Anda telah berhasil disimpan dan akan segera diproses!');
    }

    public function edit($id)
    {
        $grooming = Grooming::where('id', $id)->where('status', 'menunggu')->firstOrFail();
        $jenisGrooming = JenisGrooming::all();

        return view('grooming.edit-booking', compact('grooming', 'jenisGrooming'));
    }

    public function update(Request $request, $id)
    {
        $grooming = Grooming::where('id', $id)->where('status', 'menunggu')->firstOrFail();

        $validatedData = $request->validate([
            'id_jenis' => 'required|exists:jenis_grooming,id',
            'tanggal_booking' => 'required|date',
            'nama_kucing' => 'required|string|max:255',
            'umur' => 'required|numeric|min:0',
            'berat' => 'required|numeric|min:0',
        ]);

        $jenisGrooming = JenisGrooming::find($validatedData['id_jenis']);
        $hargaDasar = $jenisGrooming->harga;
        $berat = $validatedData['berat'];
        $hargaTotal = $hargaDasar + max(0, $berat - 5) * $hargaDasar * 0.1;

        $grooming->update([
            'id_jenis' => $validatedData['id_jenis'],
            'tanggal_booking' => $validatedData['tanggal_booking'],
            'nama_kucing' => $validatedData['nama_kucing'],
            'umur' => $validatedData['umur'],
            'berat' => $validatedData['berat'],
            'harga_total' => $hargaTotal,
        ]);

        return redirect()->route('grooming.index')->with('status', 'Booking grooming berhasil diperbarui.');
    }

    public function cancel($id)
    {
        $grooming = Grooming::findOrFail($id);
    
        // Jika status grooming adalah selesai, tandai sebagai dihapus
        if ($grooming->status === 'selesai') {
            $grooming->is_deleted = true;
        } else {
            // Jika status grooming selain 'selesai', ubah menjadi dibatalkan
            $grooming->status = 'dibatalkan';
        }
    
        $grooming->save();
    
        // Menampilkan pesan konfirmasi untuk pembatalan
        return back()->with('message', 'Status booking berhasil diperbarui.');
    }    

    //ADMIN
    public function indexAdmin()
    {
        // Mengambil data grooming beserta jenis grooming dan transaksi grooming
        $grooming = Grooming::with(['jenisGrooming', 'transaksi'])->paginate(10);
    
        return view('admin.data-grooming', compact('grooming'));
    }    

    public function pemesananGrooming()
    {
        $grooming = Grooming::with('jenisGrooming')
            ->where('status', 'menunggu')
            ->paginate(10);

        return view('admin.pemesanan-grooming', compact('grooming'));
    }

    public function payment($id)
    {
        $grooming = Grooming::findOrFail($id);

        $grooming->status = 'payment';
        $grooming->save();

        return response()->json(['success' => true, 'message' => 'Booking berhasil dikonfirmasi']);
    }

}
