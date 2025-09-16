<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Pegawai;
use App\Models\Aktivitas;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('pegawai')->latest()->get();
        return view('admin.absensi.index', compact('absensi'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('admin.absensi.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'tanggal'    => 'required|date',
            'status'     => 'required|in:Hadir,Izin,Sakit,Cuti,Alpha',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $absensi = Absensi::create($request->all());

        // Tambahkan log aktivitas
        Aktivitas::create([
            'deskripsi' => 'Absensi ditambahkan untuk pegawai ' 
                . $absensi->pegawai->nama 
                . ' dengan status ' . $absensi->status,
        ]);

        return redirect()->route('admin.absensi.index')
            ->with('success', 'Absensi berhasil ditambahkan');
    }

    public function show($id)
    {
        $absensi = Absensi::with('pegawai')->findOrFail($id);
        return view('admin.absensi.show', compact('absensi'));
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('admin.absensi.edit', compact('absensi', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'tanggal'    => 'required|date',
            'status'     => 'required|in:Hadir,Izin,Sakit,Cuti,Alpha',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        // Tambahkan log aktivitas update
        Aktivitas::create([
            'deskripsi' => 'Absensi pegawai ' 
                . $absensi->pegawai->nama 
                . ' diperbarui menjadi status ' . $absensi->status,
        ]);

        return redirect()->route('admin.absensi.index')
            ->with('success', 'Absensi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);

        // Tambahkan log aktivitas delete
        Aktivitas::create([
            'deskripsi' => 'Absensi pegawai ' 
                . $absensi->pegawai->nama 
                . ' pada tanggal ' . $absensi->tanggal 
                . ' telah dihapus',
        ]);

        $absensi->delete();

        return redirect()->route('admin.absensi.index')
            ->with('success', 'Absensi berhasil dihapus');
    }
}
