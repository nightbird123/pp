<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\Cuti;

class LaporanController extends Controller
{
    public function pegawai()
    {
        $pegawai = Pegawai::all();
        return view('hrd.laporan.pegawai', compact('pegawai'));
    }

    public function absensi()
    {
        $absensi = Absensi::with('pegawai')->get();
        return view('hrd.laporan.absensi', compact('absensi'));
    }

    public function cuti()
    {
        $cuti = Cuti::with('pegawai')->get();
        return view('hrd.laporan.cuti', compact('cuti'));
    }
}
