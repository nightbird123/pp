@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Edit Cuti</h4>

    <form action="{{ route('admin.cuti.update', $cuti->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Pegawai</label>
            <select name="pegawai_id" class="form-control" required>
                @foreach($pegawai as $p)
                <option value="{{ $p->id }}" {{ $cuti->pegawai_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ $cuti->tanggal_mulai }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ $cuti->tanggal_selesai }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Cuti</label>
            <input type="text" name="jenis_cuti" class="form-control" value="{{ $cuti->jenis_cuti }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Pending" {{ $cuti->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Disetujui" {{ $cuti->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Ditolak" {{ $cuti->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.cuti.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
