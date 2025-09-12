<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hrd;
use App\Models\Departemen;
use Illuminate\Http\Request;

class HrdController extends Controller
{
public function index()
{
    // Ambil semua HRD beserta departemen dan pegawai
    $hrd = Hrd::with('departemen', 'pegawai')->get();

    // Hitung jumlah pegawai per HRD
    $jumlahPegawai = $hrd->mapWithKeys(fn($h) => [$h->id => $h->pegawai->count()]);

    // Total ringkasan
    $totalPegawai = \App\Models\Pegawai::count();
    $totalHrd     = Hrd::count();
    $totalDepartemen = \App\Models\Departemen::count();

    // Kirim semua ke view
    return view('admin.hrd.index', compact(
        'hrd',
        'jumlahPegawai',
        'totalPegawai',
        'totalHrd',
        'totalDepartemen'
    ));
}




    public function create()
    {
        $departemen = Departemen::all();
        return view('admin.hrd.create', compact('departemen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jabatan' => 'nullable|string|max:100',
            'departemen_id' => 'nullable|exists:departemen,id',
            'email' => 'nullable|email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        Hrd::create($request->only([
            'nama', 'nip', 'jabatan', 'departemen_id',
            'email', 'no_hp', 'alamat', 'status'
        ]));

        return redirect()->route('admin.hrd.index')
            ->with('success', 'Data HRD berhasil ditambahkan.');
    }

    public function edit(Hrd $hrd)
    {
        $departemen = Departemen::all();
        return view('admin.hrd.edit', compact('hrd', 'departemen'));
    }

    public function update(Request $request, Hrd $hrd)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jabatan' => 'nullable|string|max:100',
            'departemen_id' => 'nullable|exists:departemen,id',
            'email' => 'nullable|email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $hrd->update($request->only([
            'nama', 'nip', 'jabatan', 'departemen_id',
            'email', 'no_hp', 'alamat', 'status'
        ]));

        return redirect()->route('admin.hrd.index')
            ->with('success', 'Data HRD berhasil diperbarui.');
    }

    public function show(Hrd $hrd)
    {
        return view('admin.hrd.show', compact('hrd'));
    }

    public function destroy(Hrd $hrd)
    {
        $hrd->delete();
        return redirect()->route('admin.hrd.index')
            ->with('success', 'Data HRD berhasil dihapus.');
    }
}
