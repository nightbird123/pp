<?php

namespace App\Http\Controllers;

use App\Models\Hrd;
use App\Models\Departemen;
use Illuminate\Http\Request;

class HrdController extends Controller
{
    public function index()
    {
        $hrd = Hrd::with('departemen')->get();
        return view('admin.hrd.index', compact('hrd'));
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('admin.hrd.create', compact('departemen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'nullable|email|unique:hrd',
        ]);

        Hrd::create($request->all());
        return redirect()->route('admin.hrd.index')->with('success','HRD berhasil ditambahkan');
    }

    public function edit(Hrd $hrd)
    {
        $departemen = Departemen::all();
        return view('admin.hrd.edit', compact('hrd','departemen'));
    }

    public function update(Request $request, Hrd $hrd)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'nullable|email|unique:hrd,email,'.$hrd->id,
        ]);

        $hrd->update($request->all());
        return redirect()->route('admin.hrd.index')->with('success','HRD berhasil diupdate');
    }

    public function destroy(Hrd $hrd)
    {
        $hrd->delete();
        return redirect()->route('admin.hrd.index')->with('success','HRD berhasil dihapus');
    }
}