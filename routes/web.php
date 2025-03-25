<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiProdukController;
use App\Http\Controllers\ProdukFavoriteController;
use App\Http\Controllers\JenisGroomingController;
use App\Http\Controllers\GroomingController;
use App\Http\Controllers\TransaksiGroomingController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/transaksi-grooming', function () {
    return view('grooming.transaksi-grooming');
});

//AUTH
Route::get('/register', [AuthController::class, 'registerView'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('auth.reset-password');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.reset-password.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// VERIFIKASI EMAIL
Route::middleware('auth')->prefix('email')->group(function () {
    Route::get('verify', [AuthController::class, 'verifyEmailView'])->name('verification.notice');
    Route::get('verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['signed'])->name('verification.verify');
    Route::post('verification-notification', [AuthController::class, 'resendVerificationEmail'])->middleware('throttle:6,1')->name('verification.send');
});


//PELANGGAN 
Route::group(['middleware' => 'role:pelanggan'], function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //GROOMING 
    Route::get('/user/grooming', [GroomingController::class, 'index'])->name('grooming.index');
    Route::get('/grooming/booking-grooming', [GroomingController::class, 'create'])->name('grooming.booking-grooming');
    Route::post('/grooming/store', [GroomingController::class, 'store'])->name('grooming.store');
    Route::get('/grooming/edit/{id}', [GroomingController::class, 'edit'])->name('grooming.edit-booking');
    Route::put('/grooming/update/{id}', [GroomingController::class, 'update'])->name('grooming.update');
    Route::delete('/grooming/cancel/{id}', [GroomingController::class, 'cancel'])->name('grooming.cancel');
    //TRANSAKSI GROOMING
    Route::get('/grooming/transaksi-grooming/{id}', [TransaksiGroomingController::class, 'show'])->name('grooming.transaksi-grooming');
    Route::post('/grooming/transaksi-grooming/{id}', [TransaksiGroomingController::class, 'store'])->name('transaksi-grooming.store');

    //PRODUK
    Route::get('/user/produks', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produks/filter', [ProdukController::class, 'filter'])->name('produk.filter');
    Route::post('/produks/cart/add', [ProdukController::class, 'add'])->name('cart.add');
    Route::get('/api/produk/{id}', [ProdukController::class, 'showJson']);
    Route::get('/produks/detail-produk/{id}', [ProdukController::class, 'showView'])->name('produk.detail-produk');
    //TRANSAKSI PRODUK
    Route::get('/transaksi-produk', [TransaksiProdukController::class, 'index'])->name('produk.transaksi-produk');
    Route::post('/transaksi-produk/store', [TransaksiProdukController::class, 'store'])->name('transaksi-produk.store');

    //PRODUK FAVORITE
    Route::post('/produk/{produk}/favorite', [ProdukFavoriteController::class, 'store'])->name('produk.favorite.store');
    Route::delete('/produk/{produk}/favorite', [ProdukFavoriteController::class, 'destroy'])->name('produk.favorite.destroy');
});

//ADMIN
Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');
    //DATA PELANGGAN 
    Route::get('/admin/data-pelanggan', [UserController::class, 'indexAdmin'])->name('admin.data-pelanggan');

    //KATEGORI PRODUK
    Route::get('/admin/kategori-produk', [KategoriProdukController::class, 'index'])->name('admin.kategori-produk');
    Route::post('/admin/kategori-produk/store', [KategoriProdukController::class, 'store'])->name('kategori-produk.store');
    Route::get('/admin/kategori-produk/{id}/edit', [KategoriProdukController::class, 'edit'])->name('kategori-produk.edit');
    Route::put('/admin/kategori-produk/{id}', [KategoriProdukController::class, 'update'])->name('kategori-produk.update');
    Route::delete('/admin/kategori-produk/{id}', [KategoriProdukController::class, 'destroy'])->name('kategori-produk.destroy');
    Route::get('/admin/kategori-produk/search', [KategoriProdukController::class, 'search'])->name('kategori-produk.search');

    //PRODUK 
    Route::get('/admin/produk', [ProdukController::class, 'indexAdmin'])->name('admin.produk');
    Route::post('/admin/produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/admin/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/admin/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/admin/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::get('/admin/produk/search', [ProdukController::class, 'search'])->name('produk.search');
    Route::get('/admin/profit/{periode}', [ProdukController::class, 'getProfit']);
    Route::get('/api/admin/produk/{id}', [ProdukController::class, 'showJson']);

    //DATA PEMBELIAN PRODUK
    Route::get('/admin/data-pembelian-produk', [ProdukController::class, 'pembelianProduk'])->name('admin.data-pembelian-produk');

    //TRANSAKSI PRODUK
    Route::get('/admin/transaksi', [TransaksiProdukController::class, 'indexAdmin'])->name('admin.transaksi');
    Route::delete('/admin/transaksi/{id}', [TransaksiProdukController::class, 'destroy'])->name('transaksi.destroy');

    //JENIS GROOMING 
    Route::get('/admin/jenis-grooming', [JenisGroomingController::class, 'index'])->name('admin.jenis-grooming');
    Route::post('/admin/jenis-grooming/store', [JenisGroomingController::class, 'store'])->name('jenis-grooming.store');
    Route::get('/admin/jenis-grooming/{id}/edit', [JenisGroomingController::class, 'edit'])->name('jenis-grooming.edit');
    Route::put('/admin/jenis-grooming/{id}', [JenisGroomingController::class, 'update'])->name('jenis-grooming.update');
    Route::delete('/admin/jenis-grooming/{id}', [JenisGroomingController::class, 'destroy'])->name('jenis-grooming.destroy');
    Route::get('/admin/jenis-grooming/search', [JenisGroomingController::class, 'search'])->name('jenis-grooming.search');

    //PEMESANAN GROOMING
    Route::get('/admin/pemesanan-grooming', [GroomingController::class, 'pemesananGrooming'])->name('admin.pemesanan-grooming');
    Route::put('/pemesanan-grooming/{id}/payment', [GroomingController::class, 'payment']);

    //DATA GROOMING
    Route::get('/admin/data-grooming', [GroomingController::class, 'indexAdmin'])->name('admin.data-grooming');

    //TRANSAKSI GROOMING
    Route::get('/admin/grooming-transaksi', [TransaksiGroomingController::class, 'indexAdmin'])->name('admin.grooming-transaksi');
    Route::delete('/admin/grooming-transaksi/{id}', [TransaksiGroomingController::class, 'destroy'])->name('grooming-transaksi.destroy');
});

//KARYAWAN
Route::group(['middleware' => 'role:karyawan'], function () {
    Route::get('/karyawan/dashboard', [DashboardController::class, 'karyawanIndex'])->name('karyawan.dashboard');
});

//PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/user-profile', [UserController::class, 'showProfile'])->name('profile.profile');
    Route::get('/user-profile/edit', [UserController::class, 'editProfile'])->name('profile.edit-profile');
    Route::put('/user-profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});