<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HRDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PegawaiController;
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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


// Dashboard HRD
Route::middleware(['auth', 'role:hrd'])->group(function () {
    Route::get('/hrd/dashboard', [HRDController::class, 'index'])->name('hrd.dashboard');
});


Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/profile', function () {
    return view('profile');
})->name('profile.edit');
Route::get('/settings', function () {
    return view('settings');
})->name('settings');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
     Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
});