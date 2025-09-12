@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Laporan & Ringkasan Data</h4>
    <hr>

    <!-- Ringkasan Angka -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total Pegawai</h6>
                    <h3>{{ $totalPegawai }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total HRD</h6>
                    <h3>{{ $totalHrd }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total Departemen</h6>
                    <h3>{{ $totalDepartemen }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Ringkasan -->
    <h5>Ringkasan Pegawai per Departemen</h5>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Departemen</th>
                <th>Jumlah Pegawai</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pegawaiPerDepartemen as $d)
                <tr>
                    <td>{{ $d->nama_departemen }}</td>
                    <td>{{ $d->jumlah }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">Belum ada data pegawai</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
