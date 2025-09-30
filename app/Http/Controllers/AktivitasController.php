<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aktivitas;

class AktivitasController extends Controller
{
   
    public function reset()
    {
        Aktivitas::truncate(); 
        return redirect()->back()->with('success', 'Aktivitas berhasil direset.');
    }

    // Hapus satu aktivitas (opsional)
    public function destroy($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->delete();

        return redirect()->back()->with('success', 'Aktivitas berhasil dihapus.');
    }
}
