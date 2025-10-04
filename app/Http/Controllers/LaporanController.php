<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;
use App\Models\Absensi;
use App\Models\Cuti;

class LaporanController extends Controller
{
public function index(Request $request)
{
    $departemen = Departemen::all();

    $pegawai = Pegawai::with('departemen')
        ->when($request->departemen_id, function ($query) use ($request) {
            $query->where('departemen_id', $request->departemen_id);
        })
        ->get();

    $absensi = Absensi::with('pegawai.departemen')
        ->when($request->departemen_id, function ($query) use ($request) {
            $query->whereHas('pegawai', function ($q) use ($request) {
                $q->where('departemen_id', $request->departemen_id);
            });
        })
        ->get();

    $cuti = Cuti::with('pegawai.departemen')
        ->when($request->departemen_id, function ($query) use ($request) {
            $query->whereHas('pegawai', function ($q) use ($request) {
                $q->where('departemen_id', $request->departemen_id);
            });
        })
        ->get();

    return view('laporan.index', compact('departemen', 'pegawai', 'absensi', 'cuti'));
}


    // Laporan Pegawai
public function pegawai(Request $request)
{
    $departemen = Departemen::all();

    $pegawai = Pegawai::with('departemen')
        ->when($request->departemen_id, function ($query) use ($request) {
            $query->where('departemen_id', $request->departemen_id);
        })
        ->get();
    return view('laporan.index', compact('pegawai', 'departemen'));
}


    // Laporan Absensi
    public function absensi(Request $request)
    {
        $departemen = Departemen::all();

        $absensi = Absensi::with('pegawai.departemen')
            ->when($request->departemen_id, function ($query) use ($request) {
                $query->whereHas('pegawai', function ($q) use ($request) {
                    $q->where('departemen_id', $request->departemen_id);
                });
            })
            ->get();

        return view('admin.absensi.index', compact('absensi', 'departemen'));
    }

    // Laporan Cuti
    public function cuti(Request $request)
    {
        $departemen = Departemen::all();

        $cuti = Cuti::with('pegawai.departemen')
            ->when($request->departemen_id, function ($query) use ($request) {
                $query->whereHas('pegawai', function ($q) use ($request) {
                    $q->where('departemen_id', $request->departemen_id);
                });
            })
            ->get();

        return view('admin.cuti.index', compact('cuti', 'departemen'));
    }
}
