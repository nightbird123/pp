@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Tambah Absensi</h4>

    <form action="{{ route('admin.absensi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pegawai</label>
            <select name="pegawai_id" class="form-control" required>
                <option value="">-- Pilih Pegawai --</option>
                @foreach($pegawai as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpha">Alpha</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.absensi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
