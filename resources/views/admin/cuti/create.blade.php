@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Tambah Cuti</h4>

    <form action="{{ route('admin.cuti.store') }}" method="POST">
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
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Cuti</label>
            <input type="text" name="jenis_cuti" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Disetujui">Disetujui</option>
                <option value="Ditolak">Ditolak</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.cuti.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
