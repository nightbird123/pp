<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;
use App\Models\User; // Asumsi HRD tersimpan di table users
use App\Models\Hrd;

class AdminController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        $jumlahPegawai = $pegawai->count();
        $totalDepartemen = Departemen::count();
        $jumlahHrd = Hrd::count();
// kalau role HRD disimpan di kolom 'role'

        return view('admin.index', compact('pegawai', 'jumlahPegawai', 'totalDepartemen', 'jumlahHrd'));
    }

    public function createPegawai()
    {
        $departemen = Departemen::all();
        return view('pegawai.create', compact('departemen'));
    }
}
