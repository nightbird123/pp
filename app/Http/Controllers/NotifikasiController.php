<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    
    public function add(Request $request)
    {
        $message = $request->input('message', 'Notifikasi baru');
        $notifs = session()->get('notifs', []);
        $notifs[] = $message;
        session()->put('notifs', $notifs);

        return back()->with('success', 'Notifikasi ditambahkan!');
    }

    public function reset()
    {
        session()->forget('notifs');
        return back()->with('success', 'Semua notifikasi telah direset!');
    }
}
