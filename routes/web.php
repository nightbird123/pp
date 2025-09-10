<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HRDController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('role:admin');

Route::get('/hrd/dashboard', function () {
    return view('hrd.dashboard');
})->middleware('role:hrd');
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Dashboard Admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Dashboard HRD
Route::get('/hrd/dashboard', [HRDController::class, 'index'])->name('hrd.dashboard');
