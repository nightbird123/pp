<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\Aktivitas;

class CutiController extends Controller
{
    public function index()
    {
        $cuti = Cuti::with('pegawai')->latest()->get();
        return view('admin.cuti.index', compact('cuti'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('admin.cuti.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id'      => 'required|exists:pegawai,id',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_cuti'      => 'required|string|max:255',
            'status'          => 'nullable|in:Pending,Disetujui,Ditolak',
            'keterangan'      => 'nullable|string',
        ]);

        $cuti = Cuti::create($request->all());
        Aktivitas::create([
            'deskripsi' => 'Menambahkan cuti untuk pegawai: ' . $cuti->pegawai->nama,
        ]);

        return redirect()->route('admin.cuti.index')->with('success', 'Data cuti berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('admin.cuti.edit', compact('cuti', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pegawai_id'      => 'required|exists:pegawai,id',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_cuti'      => 'required|string|max:255',
            'status'          => 'required|in:Pending,Disetujui,Ditolak',
            'keterangan'      => 'nullable|string',
        ]);

        $cuti = Cuti::findOrFail($id);
        $cuti->update($request->all());

        Aktivitas::create([
            'deskripsi' => 'Memperbarui cuti untuk pegawai: ' . $cuti->pegawai->nama,
        ]);

        return redirect()->route('admin.cuti.index')->with('success', 'Data cuti berhasil diupdate');
    }

    public function show($id)
    {
        $cuti = Cuti::with('pegawai')->findOrFail($id);
        return view('admin.cuti.show', compact('cuti'));
    }

    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $pegawaiNama = $cuti->pegawai->nama; 
        $cuti->delete();

        Aktivitas::create([
            'deskripsi' => 'Menghapus cuti untuk pegawai: ' . $pegawaiNama,
        ]);

        return redirect()->route('admin.cuti.index')->with('success', 'Data cuti berhasil dihapus');
    }
}
