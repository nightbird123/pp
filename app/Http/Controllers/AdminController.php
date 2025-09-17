<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;
use App\Models\Hrd;
use App\Models\Aktivitas;
use App\Models\Absensi;

class AdminController extends Controller
{
    public function index()
    {
        // Hitung data utama
        $jumlahPegawai   = Pegawai::count();
        $totalDepartemen = Departemen::count();
        $jumlahHrd       = Hrd::count();

 $jumlahHadir = Absensi::whereDate('tanggal', today())
    ->where('status', 'Hadir')
    ->count();

if ($jumlahHadir == 0) {
    $jumlahHadir = Absensi::where('status', 'Hadir')->count();
}


        // Ambil aktivitas terbaru (5 terakhir)
        $aktivitasTerbaru = Aktivitas::latest()->take(5)->get();

        return view('admin.index', compact(
            'jumlahPegawai',
            'totalDepartemen',
            'jumlahHrd',
            'jumlahHadir',
            'aktivitasTerbaru'
        ));
    }

    public function createPegawai()
    {
        $departemen = Departemen::all();
        return view('pegawai.create', compact('departemen'));
    }
}
