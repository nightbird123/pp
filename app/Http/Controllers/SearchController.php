<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;

class SearchController extends Controller
{
public function index(Request $request)
{
    $query = $request->input('q');
    $departemen = Departemen::where('nama_departemen', 'like', "%{$query}%")->get();
    $departemenIds = $departemen->pluck('id');
    $pegawai = Pegawai::where('nama', 'like', "%{$query}%")
        ->orWhere('jabatan', 'like', "%{$query}%")
        ->orWhere('nip', 'like', "%{$query}%")
        ->orWhereIn('departemen_id', $departemenIds)
        ->get();
        
    if ($pegawai->isNotEmpty()) {
        $pegawaiDeptIds = $pegawai->pluck('departemen_id')->unique();
        $extraDepartemen = Departemen::whereIn('id', $pegawaiDeptIds)->get();
        $departemen = $departemen->merge($extraDepartemen);
    }

    return view('search.index', compact('query', 'pegawai', 'departemen'));
}

}
