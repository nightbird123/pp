<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $pegawai = Pegawai::with('departemen')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('pegawai.create', compact('departemen'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'nip'           => 'required|string|unique:pegawai,nip',
        'nama'          => 'required|string|max:255',
        'jabatan'       => 'nullable|string|max:255',
        'alamat'        => 'nullable|string',
        'email'         => 'nullable|email|unique:pegawai,email',
        'no_telp'       => 'nullable|string|max:20',
        'tanggal_masuk' => 'nullable|date',
        'departemen_id' => 'nullable|exists:departemen,id',
    ]);

    Pegawai::create($request->only([
        'nip', 'nama', 'jabatan', 'alamat', 'email',
        'no_telp', 'tanggal_masuk', 'departemen_id'
    ]));

    return redirect()->route('pegawai.index')
        ->with('success', 'Pegawai berhasil ditambahkan!');
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
