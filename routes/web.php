<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HrdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AbsensiController;
use App\Http\Controllers\admin\CutiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\Hrd\HrdDashboardController;
use App\Http\Controllers\Hrd\PegawaiController as HrdPegawaiController;
use App\Http\Controllers\Hrd\LaporanController as HrdLaporanController;
use App\Http\Controllers\NotifikasiController;
// Default route ke login
Route::get('/', function () {
    return view('landing');
});

// Auth routes  
Auth::routes();

// Home (opsional)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Login manual
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Dashboard Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/hrd', HrdController::class);
    Route::resource('/departemen', DepartemenController::class);
    Route::resource('/pegawai', PegawaiController::class);

    // resource langsung
    Route::resource('/cuti', CutiController::class);
    Route::resource('/absensi', AbsensiController::class);

    // laporan
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/pegawai', [LaporanController::class, 'pegawai'])->name('pegawai');
        Route::get('/absensi', [LaporanController::class, 'absensi'])->name('absensi');
        Route::get('/cuti', [LaporanController::class, 'cuti'])->name('cuti');
    });
});


// Dashboard HRD (khusus role HRD)
Route::group(['prefix' => 'hrd', 'as' => 'hrd.', 'middleware' => ['auth','role:hrd']], function() {
    // Dashboard
    Route::get('/dashboard', [HrdDashboardController::class, 'index'])->name('dashboard');

    // Kelola Pegawai
    Route::resource('/pegawai', HrdPegawaiController::class);

    // Laporan HRD
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/pegawai', [HrdLaporanController::class, 'pegawai'])->name('pegawai');
        Route::get('/absensi', [HrdLaporanController::class, 'absensi'])->name('absensi');
        Route::get('/cuti', [HrdLaporanController::class, 'cuti'])->name('cuti');
    });
});


// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Profile & Settings
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');
});

// Pegawai (opsional, kalau memang bukan di admin prefix)
Route::middleware(['auth'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show'])->name('pegawai.show');
});

// Departemen global (kalau memang butuh)
Route::resource('departemen', DepartemenController::class)
    ->parameters(['departemen' => 'departemen']);

// Laporan khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});

// Profile CRUD
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Reset semua
Route::delete('/aktivitas/reset', [AktivitasController::class, 'reset'])->name('aktivitas.reset');

// Hapus satu aktivitas
Route::delete('/aktivitas/{id}', [AktivitasController::class, 'destroy'])->name('aktivitas.destroy');

// Notifikasi
Route::post('/notif/add', [NotifikasiController::class, 'add'])->name('notif.add');
Route::post('/notif/reset', [NotifikasiController::class, 'reset'])->name('notif.reset');





