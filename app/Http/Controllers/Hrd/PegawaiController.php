<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Departemen;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('departemen')->get();
        return view('hrd.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('hrd.pegawai.create', compact('departemen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawai',
            'nama' => 'required',
            'jabatan' => 'required',
            'departemen_id' => 'required',
        ]);

        Pegawai::create($request->all());
        return redirect()->route('hrd.pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    public function show(Pegawai $pegawai)
    {
        return view('hrd.pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        $departemen = Departemen::all();
        return view('hrd.pegawai.edit', compact('pegawai', 'departemen'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $pegawai->update($request->all());
        return redirect()->route('hrd.pegawai.index')->with('success', 'Pegawai berhasil diperbarui!');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('hrd.pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}
