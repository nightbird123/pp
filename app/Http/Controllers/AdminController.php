<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;
use App\Models\Hrd;
use App\Models\Aktivitas;
use App\Models\Absensi;
use App\Models\Cuti;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
public function index()
{
    // --- Statistik Umum ---
    $jumlahPegawai   = Pegawai::count();
    $totalDepartemen = Departemen::count();
    $jumlahHrd       = Hrd::count();

    // --- Absensi Hari Ini ---
    $jumlahHadir = Absensi::whereDate('tanggal', today())
        ->where('status', 'Hadir')
        ->count();

    if ($jumlahHadir == 0) {
        $jumlahHadir = Absensi::where('status', 'Hadir')->count();
    }

    $jumlahAbsensi = Absensi::whereDate('tanggal', today())->count();

    // --- Pegawai Cuti Hari Ini ---
    $jumlahCuti = Cuti::whereDate('tanggal_mulai', '<=', today())
        ->whereDate('tanggal_selesai', '>=', today())
        ->count();

    // --- Statistik Cuti ---
    $cutiPending = Cuti::where('status', 'Pending')
        ->whereDate('tanggal_mulai', '<=', today())
        ->whereDate('tanggal_selesai', '>=', today())
        ->count();

    $cutiDisetujui = Cuti::where('status', 'Disetujui')
        ->whereDate('tanggal_mulai', '<=', today())
        ->whereDate('tanggal_selesai', '>=', today())
        ->count();

    $cutiDitolak = Cuti::where('status', 'Ditolak')
        ->whereDate('tanggal_mulai', '<=', today())
        ->whereDate('tanggal_selesai', '>=', today())
        ->count();

    $cutiStatusChart = [
        'Pending'   => $cutiPending,
        'Disetujui' => $cutiDisetujui,
        'Ditolak'   => $cutiDitolak,
    ];

    // --- Aktivitas Terbaru ---
    $aktivitasTerbaru = Aktivitas::latest()->take(5)->get();

    // --- Tren Aktivitas (7 hari terakhir) ---
    $trenAktivitas = Aktivitas::selectRaw('DATE(created_at) as tanggal, COUNT(*) as total')
        ->where('created_at', '>=', Carbon::now()->subDays(6))
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->pluck('total', 'tanggal')
        ->toArray();

    // Pastikan semua 7 hari ada (meski 0)
    $labels = [];
    $data = [];
    for ($i = 6; $i >= 0; $i--) {
        $tgl = Carbon::now()->subDays($i)->toDateString();
        $labels[$tgl] = $trenAktivitas[$tgl] ?? 0;
    }
    $trenAktivitas = $labels;

    // --- Statistik Mingguan Absensi ---
    $mingguanAbsensi = Absensi::select(
            DB::raw('DATE(tanggal) as tanggal'),
            'status',
            DB::raw('count(*) as total')
        )
        ->where('tanggal', '>=', Carbon::now()->subDays(6))
        ->groupBy('tanggal', 'status')
        ->orderBy('tanggal')
        ->get();

    $absensiChart = [];
    foreach ($mingguanAbsensi as $row) {
        $absensiChart[$row->tanggal][$row->status] = $row->total;
    }

    // --- Statistik Bulanan Cuti ---
    $bulananCuti = Cuti::select(
            DB::raw('MONTH(tanggal_mulai) as bulan'),
            DB::raw('count(*) as total')
        )
        ->whereYear('tanggal_mulai', Carbon::now()->year)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

    $cutiChart = array_fill(1, 12, 0);
    foreach ($bulananCuti as $row) {
        $cutiChart[$row->bulan] = $row->total;
    }

    // --- Distribusi Pegawai per Departemen ---
    $distribusi = Departemen::withCount('pegawai')->get();

    // --- Kirim ke view ---
    return view('admin.index', compact(
        'jumlahPegawai',
        'totalDepartemen',
        'jumlahHrd',
        'jumlahHadir',
        'jumlahAbsensi',
        'jumlahCuti',
        'cutiPending',
        'cutiDisetujui',
        'cutiDitolak',
        'cutiStatusChart',
        'aktivitasTerbaru',
        'trenAktivitas',   
        'absensiChart',
        'cutiChart',
        'distribusi'
    ));
}


    public function createPegawai()
    {
        $departemen = Departemen::all();
        return view('pegawai.create', compact('departemen'));
    }
}
