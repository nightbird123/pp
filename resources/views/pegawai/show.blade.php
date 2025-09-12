@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Detail Pegawai</h4>
        <p><strong>NIP:</strong> {{ $pegawai->nip }}</p>
        <p><strong>Nama:</strong> {{ $pegawai->nama }}</p>
        <p><strong>Jabatan:</strong> {{ $pegawai->jabatan }}</p>
        <p><strong>Departemen:</strong> {{ $pegawai->departemen->nama_departemen ?? '-' }}</p>
        <p><strong>Tanggal Masuk:</strong> {{ $pegawai->tanggal_masuk ?? '-' }}</p>
        <p><strong>No. Telepon:</strong> {{ $pegawai->no_telp ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $pegawai->alamat ?? '-' }}</p>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
