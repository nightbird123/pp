<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    // Tambah notifikasi baru
    public function add(Request $request)
    {
        $message = $request->input('message', 'Notifikasi baru');

        // Ambil session notif lama
        $notifs = session()->get('notifs', []);

        // Tambah notif baru
        $notifs[] = $message;

        // Simpan ke session
        session()->put('notifs', $notifs);

        return back()->with('success', 'Notifikasi ditambahkan!');
    }

    // Reset notifikasi
    public function reset()
    {
        session()->forget('notifs');
        return back()->with('success', 'Semua notifikasi telah direset!');
    }
}
