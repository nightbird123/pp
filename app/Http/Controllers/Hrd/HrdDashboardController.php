<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;
use App\Models\Absensi;
use App\Models\Aktivitas;

class HrdDashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard HRD
     */
    public function index()
    {
        // Hitung jumlah total pegawai
        $jumlahPegawai = Pegawai::count();

        // Hitung jumlah departemen
        $jumlahDepartemen = Departemen::count();

        // Hitung pegawai yang hadir hari ini
        $pegawaiHadir = Absensi::whereDate('tanggal', today())
            ->where('status', 'Hadir')
            ->count();

        // Ambil label dan data untuk chart donat (cek nama kolom departemen)
        $departemenLabels = Departemen::pluck('nama_departemen')->toArray(); // ubah ke nama kolom yang benar
        $departemenData = Departemen::withCount('pegawai')->pluck('pegawai_count')->toArray();

        // Aktivitas terbaru
        $aktivitas = Aktivitas::latest()->take(10)->get();

        return view('hrd.index', compact(
            'jumlahPegawai',
            'jumlahDepartemen',
            'pegawaiHadir',
            'departemenLabels',
            'departemenData',
            'aktivitas'
        ));
    }

    /**
     * Fitur pencarian pegawai dari navbar search
     */
    public function search(Request $request)
    {
        $keyword = $request->input('q');

        $pegawai = Pegawai::where('nama', 'like', "%{$keyword}%")
            ->orWhere('nip', 'like', "%{$keyword}%")
            ->orWhere('jabatan', 'like', "%{$keyword}%")
            ->get();

        return view('hrd.pegawai.index', compact('pegawai'));
    }
}
