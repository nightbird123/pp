@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Detail Cuti</h4>

    <table class="table table-bordered">
        <tr>
            <th>Nama Pegawai</th>
            <td>{{ $cuti->pegawai->nama }}</td>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>
            <td>{{ $cuti->tanggal_mulai }}</td>
        </tr>
        <tr>
            <th>Tanggal Selesai</th>
            <td>{{ $cuti->tanggal_selesai }}</td>
        </tr>
        <tr>
            <th>Jenis Cuti</th>
            <td>{{ $cuti->jenis_cuti }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $cuti->status }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $cuti->keterangan ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.cuti.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
