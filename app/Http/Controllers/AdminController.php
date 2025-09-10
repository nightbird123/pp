<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class AdminController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all(); // variabel sesuai dengan compact
        return view('admin.index', compact('pegawai'));
    }
    public function create()
{
    return view('pegawai.create'); // buat view form tambah pegawai
}
}
