@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Detail Absensi</h4>

    <table class="table table-bordered">
        <tr>
            <th>Nama Pegawai</th>
            <td>{{ $absensi->pegawai->nama }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $absensi->tanggal }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $absensi->status }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $absensi->keterangan ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.absensi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
