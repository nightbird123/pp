<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pegawai;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        // ambil semua data pegawai dengan relasi departemen
        $pegawai = Pegawai::with('departemen')->get();

        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        return view('pegawai.create'); // nanti buat view form tambah pegawai
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nip' => 'required|string|unique:pegawai,nip',
        'jabatan' => 'nullable|string|max:255',
    ]);

    Pegawai::create([
        'nama' => $request->nama,
        'nip' => $request->nip,
        'jabatan' => $request->jabatan,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Pegawai berhasil ditambahkan!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
