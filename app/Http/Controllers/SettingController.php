<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('settings.index', compact('user'));
    }

public function update(Request $request)
{
    $request->validate([
        'language' => 'required|in:id,en',
        'theme'    => 'required|in:light,dark',
    ]);

    // Simpan pilihan ke session, bukan database
    session([
        'language' => $request->language,
        'theme'    => $request->theme,
    ]);

    return back()->with('success', 'Pengaturan berhasil disimpan!');
}

}
