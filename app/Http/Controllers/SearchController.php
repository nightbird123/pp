<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai; // ganti sesuai model yang mau dicari

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        // contoh: cari di tabel pegawai
        $results = Pegawai::where('nama', 'like', "%{$query}%")
            ->orWhere('nip', 'like', "%{$query}%")
            ->get();

        return view('search.results', compact('results', 'query'));
    }
}
