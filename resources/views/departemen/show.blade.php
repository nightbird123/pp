@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Detail Departemen</h4>
    <table class="table table-bordered">
        <tr>
            <th>Nama Departemen</th>
            <td>{{ $departemen->nama_departemen }}</td>
        </tr>
        <tr>
            <th>Jumlah Pegawai</th>
            <td>-</td>
        </tr>
    </table>
    <a href="{{ route('departemen.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
