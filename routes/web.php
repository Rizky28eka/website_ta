<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardOperatorController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\KondisiBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\IventarisController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\StokOpnameController;
use App\Http\Middleware\RoleAccessMiddleware;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ============================
// |  Halaman Utama / Login  |
// ============================

Route::get('/', function () {
    return view('pages.login.login');
})->name('home');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// ============================
// |     Protected Routes     |
// ============================

Route::middleware(['auth', RoleAccessMiddleware::class])->group(function () {
    // Dashboard untuk admin/operator → isi view dibedakan di controller
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/laporan/inventaris', [LaporanController::class, 'showInventaris'])->name('laporan.inventaris');
Route::get('/laporan/inventaris/pdf', [LaporanController::class, 'exportInventarisPDF'])->name('laporan.inventaris.pdf');
Route::get('/laporan/stokopname', [LaporanController::class, 'showStokOpname'])->name('laporan.stokopname');
Route::get('/laporan/stokopname/pdf', [LaporanController::class, 'exportStokOpnamePDF'])->name('laporan.stokopname.pdf');   
// Modul CRUD
    Route::resource('kategori_barang', KategoriBarangController::class);
    Route::resource('satuan_barang', SatuanBarangController::class);
    Route::resource('kondisi_barang', KondisiBarangController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('inventaris', IventarisController::class);
    Route::resource('petugas', PetugasController::class);
       Route::resource('barangmasuk', BarangMasukController::class);
          Route::resource('barangkeluar', BarangKeluarController::class);
         Route::resource('stokopname', StokOpnameController::class);
    
});
