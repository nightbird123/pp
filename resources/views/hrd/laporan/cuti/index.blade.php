@extends('layoutshrd.hrd')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="fw-bold mb-3">📋 Laporan Cuti Pegawai</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-warning">
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Jenis Cuti</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cuti as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->pegawai->nama ?? '-' }}</td>
                                    <td>{{ $c->jenis_cuti }}</td>
                                    <td>{{ \Carbon\Carbon::parse($c->tanggal_mulai)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($c->tanggal_selesai)->format('d-m-Y') }}</td>
                                    <td>{{ $c->keterangan ?? '-' }}</td>
                                    <td>
                                        @if($c->status == 'Disetujui')
                                            <span class="badge bg-success">{{ $c->status }}</span>
                                        @elseif($c->status == 'Ditolak')
                                            <span class="badge bg-danger">{{ $c->status }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $c->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data cuti.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
