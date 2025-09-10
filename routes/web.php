<?php

use Illuminate\Support\Facades\Route;

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
