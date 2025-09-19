<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('hrd.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('hrd.pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|unique:pegawai',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('hrd.pegawai.index')->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('hrd.pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|unique:pegawai,nip,' . $pegawai->id,
        ]);

        $pegawai->update($request->all());

        return redirect()->route('hrd.pegawai.index')->with('success', 'Pegawai berhasil diperbarui');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('hrd.pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
