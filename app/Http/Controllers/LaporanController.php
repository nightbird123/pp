<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;

class LaporanController extends Controller
{
 public function index()
{
    $departemens = Departemen::all();

    $pegawai = Pegawai::with('departemen')
        ->when(request('departemen_id'), function($query) {
            $query->where('departemen_id', request('departemen_id'));
        })
        ->get();

    return view('laporan.index', compact('departemens', 'pegawai'));
}
}
