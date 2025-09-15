@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Edit Absensi</h4>

    <form action="{{ route('admin.absensi.update', $absensi->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Pegawai</label>
            <select name="pegawai_id" class="form-control" required>
                @foreach($pegawai as $p)
                <option value="{{ $p->id }}" {{ $absensi->pegawai_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $absensi->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                <option value="Sakit" {{ $absensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="Alpha" {{ $absensi->status == 'Alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.absensi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
