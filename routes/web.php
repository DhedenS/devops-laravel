<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\PadiController;
use App\Http\Controllers\JenisSewaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengajuanSewaController;
use App\Http\Controllers\PengajuanPadiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProduksiBerasController;
use App\Http\Controllers\LaporanTransaksiController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/berita/{id}', [HomeController::class, 'detail'])->name('berita.detail');
Route::get('/penjualan-padi', [PengajuanPadiController::class, 'penjualanView'])->name('user.penjualan_padi.penjualanpadi');
Route::get('/layanan/{jenis}', [PengajuanSewaController::class, 'formView'])->name('user.layanan.form');
Route::get('/produk/{kategori}', [HomeController::class, 'produkByKategori'])->name('user.produk.kategori');
Route::get('/layanan/alat-bajak', function () {
    return view('layanan.alat_bajak');
})->name('layanan.alat_bajak');

Route::middleware(['auth', 'PetaniMiddleware'])->group(function () {
Route::post('/pengajuan-padi/store', [PengajuanPadiController::class, 'store'])->name('pengajuanpadi.store');
Route::post('/layanan/store', [PengajuanSewaController::class, 'store'])->name('pengajuansewa.store');
Route::get('/pengajuan-sewa/create', [PengajuanSewaController::class, 'create'])->name('pengajuansewa.create');


    // Route::get('dashboard', [UseController::class, 'index'])->name('dashboard');
    // Route::get('/', [HomeController::class, 'index'])->name('beranda');
});

// --------------------[Belum Selesai]--------------------------------------
Route::prefix("/admin")->middleware(['auth', 'AdminMiddleware'])->group(function () {
    Route::get(
        'dashboard',
        [AdminController::class, 'index']
    )->name('dashboard');

    Route::resource('padi', PadiController::class)->names('padi');
    Route::resource('berita', BeritaController::class)->names('berita');
    Route::resource('produk', ProdukController::class)->names('produk');
     Route::resource('pengajuanpadi', PengajuanPadiController::class)->only(['update'])->names('pengajuanpadi');
      Route::delete('pengajuanpadi/{id}', [PengajuanPadiController::class, 'destroy'])->name('pengajuanpadi.destroy');
    Route::resource('petani', PetaniController::class)->names('petani');
    Route::get('/pengajuan', [PengajuanPadiController::class, 'index'])->name('pengajuanpadi.index');
Route::get('/pengajuanpadi/cetak/html', [PengajuanPadiController::class, 'cetakSemuaHTML'])->name('pengajuan_padi.cetak_html');
Route::get('/pengajuanpadi/cetak/pdf', [PengajuanPadiController::class, 'cetakSemuaPDF'])->name('pengajuan_padi.cetak_pdf');

  

    Route::post('/pengajuan/{id}/status', [PengajuanPadiController::class, 'updateStatus'])->name('pengajuanpadi.updateStatus');
    Route::resource('jenis-sewa', JenisSewaController::class)->names('jenis-sewa');
    Route::get('/pengajuan-sewa', [PengajuanSewaController::class, 'index'])->name('pengajuansewa.index');
    Route::post('/pengajuan-sewa/{id}/status', [PengajuanSewaController::class, 'updateStatus'])->name('pengajuansewa.updateStatus');
    Route::resource('produksi_beras', ProduksiBerasController::class)->names('produksi_beras');

Route::get('/admin/laporan-transaksi', [LaporanTransaksiController::class, 'index'])->name('laporan.transaksi');
Route::get('/admin/laporan-transaksi/cetak-pdf', [LaporanTransaksiController::class, 'cetakPDF'])->name('laporan.transaksi.cetak');
Route::get('/admin/laporan-transaksi/cetak-html', [LaporanTransaksiController::class, 'cetakHTML'])->name('laporan.transaksi.cetak.html');



    // Route::get('haha/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
    // Route lainnya tinggal tulis 'route-name' saja tanpa 'admin.' di awal
});

Route::middleware('auth')->group(function (): void {
    Route::get('/profile', [ProfileController::class, 'showProfil'])->name('profile.profil');
    Route::get('/profile/edit', [ProfileController::class, 'editProfil'])->name('profile.editProfil');
    Route::put('/profile/update', [ProfileController::class, 'updateProfil'])->name('profile.updateProfil');
});


require __DIR__ . '/auth.php'; 
