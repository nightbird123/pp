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

// Default route ke login
Route::get('/', function () {
    return view('auth.login');
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
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});

// Dashboard HRD (kalau memang ada role HRD login sendiri)
Route::group(['prefix' => 'hrd', 'as' => 'hrd.', 'middleware' => ['auth','role:hrd']], function() {
    Route::get('/dashboard', [HrdController::class, 'index'])->name('dashboard');
});

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Profile & Settings
Route::get('/profile', fn() => view('profile'))->name('profile.edit');
Route::get('/settings', fn() => view('settings'))->name('settings');

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
