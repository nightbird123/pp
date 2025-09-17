<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index'); // bikin view settings/index.blade.php
    }

    public function update(Request $request)
    {
        // Misal update tema, bahasa, dll
        $request->validate([
            'theme' => 'nullable|string',
            'language' => 'nullable|string',
        ]);

        // Simpan ke session dulu (atau ke database User kalau mau persist)
        session([
            'theme' => $request->theme,
            'language' => $request->language,
        ]);

        return redirect()->route('settings')->with('success', 'Pengaturan berhasil disimpan.');
    }
}
