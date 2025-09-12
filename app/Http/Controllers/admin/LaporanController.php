<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $totalPegawai = \App\Models\Pegawai::count();
    $totalHrd = \App\Models\Hrd::count();
    $totalDepartemen = \App\Models\Departemen::count();

    $pegawaiPerDepartemen = \App\Models\Departemen::withCount('pegawai')->get()
        ->map(function ($d) {
            return (object)[
                'nama_departemen' => $d->nama_departemen,
                'jumlah' => $d->pegawai_count,
            ];
        });

    return view('admin.laporan.index', compact(
    'totalPegawai', 'totalHrd', 'totalDepartemen', 'pegawaiPerDepartemen'
));

}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
