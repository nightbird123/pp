@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold mb-0">Data Pegawai</h4>
                    </div>
                    <p>Berikut daftar pegawai:</p>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Jumlah Pegawai</th>
                                    <th>Jumlah Departemen</th>
                                    <th>Jumlah HRD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $jumlahPegawai }}</td>
                                    <td>{{ $totalDepartemen }}</td>
                                    <td>{{ $jumlahHrd }}</td>
                                </tr>
                                @if($jumlahPegawai == 0)
                                    <tr>
                                        <td colspan="3" class="text-center">Belum ada data pegawai.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

