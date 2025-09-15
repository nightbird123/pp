<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Pegawai;

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
            'pegawai_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_cuti' => 'required',
            'status' => 'nullable|in:Pending,Disetujui,Ditolak',
        ]);

        Cuti::create($request->all());

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
            'pegawai_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_cuti' => 'required',
            'status' => 'required|in:Pending,Disetujui,Ditolak',
        ]);

        $cuti = Cuti::findOrFail($id);
        $cuti->update($request->all());

        return redirect()->route('admin.cuti.index')->with('success', 'Data cuti berhasil diupdate');
    }

    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('admin.cuti.index')->with('success', 'Data cuti berhasil dihapus');
    }
}
