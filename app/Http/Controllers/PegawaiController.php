<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;
use App\Models\Aktivitas;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('departemen')->latest()->get();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('pegawai.create', compact('departemen'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'nip'           => 'nullable|string|max:50',
        'nama'          => 'required|string|max:100',
        'jabatan'       => 'nullable|string|max:100',
        'tanggal_masuk' => 'nullable|date',
        'email'         => 'nullable|email|unique:pegawai,email',
        'no_telp'       => 'nullable|string|max:20',
        'alamat'        => 'nullable|string|max:255',
        'departemen_id' => 'required|exists:departemen,id',
    ]);

    $pegawai = Pegawai::create($validated);
    Aktivitas::create([
        'deskripsi' => 'Pegawai baru ditambahkan: ' . $pegawai->nama,
    ]);

    return redirect()->route('pegawai.index')
        ->with('success', 'Pegawai berhasil ditambahkan');
}


    public function show(Pegawai $pegawai)
    {
        $pegawai->load('departemen');
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        $departemen = Departemen::all();
        return view('pegawai.edit', compact('pegawai', 'departemen'));
    }

public function update(Request $request, Pegawai $pegawai)
{
    $validated = $request->validate([
        'nip'           => 'nullable|string|max:50',
        'nama'          => 'required|string|max:100',
        'email'         => 'nullable|email|unique:pegawai,email,' . $pegawai->id,
        'no_telp'       => 'nullable|string|max:20',
        'alamat'        => 'nullable|string|max:255',
        'departemen_id' => 'required|exists:departemen,id',
        'jabatan'       => 'nullable|string|max:100',
        'tanggal_masuk' => 'nullable|date',
    ]);

    $pegawai->update($validated);

    Aktivitas::create([
        'deskripsi' => 'Data pegawai diperbarui: ' . $pegawai->nama,
    ]);

    return redirect()->route('pegawai.index')
        ->with('success', 'Pegawai berhasil diperbarui');
}


    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        Aktivitas::create([
            'deskripsi' => 'Pegawai dihapus: ' . $pegawai->nama,
        ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus');
    }
}
