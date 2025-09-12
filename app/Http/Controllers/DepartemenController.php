<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;

class DepartemenController extends Controller
{
public function index()
{
    $departemen = Departemen::withCount('pegawai')->get();
    return view('departemen.index', compact('departemen'));
}





    public function create() {
        return view('departemen.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);

        Departemen::create(['nama_departemen' => $request->nama_departemen]);

        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function show(Departemen $departemen) {
        return view('departemen.show', compact('departemen'));
    }

    public function edit(Departemen $departemen) {
        return view('departemen.edit', compact('departemen'));
    }

    public function update(Request $request, Departemen $departemen) {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);

        $departemen->update(['nama_departemen' => $request->nama_departemen]);

        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil diupdate.');
    }

    public function destroy(Departemen $departemen) {
        $departemen->delete();
        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil dihapus.');
    }
}
