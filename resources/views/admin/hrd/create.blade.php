@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Tambah HRD</h4>

    <form action="{{ route('admin.hrd.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Departemen</label>
            <select name="departemen_id" class="form-control">
                <option value="">-- Pilih Departemen --</option>
                @foreach($departemen as $d)
                    <option value="{{ $d->id }}">{{ $d->nama_departemen }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.hrd.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
