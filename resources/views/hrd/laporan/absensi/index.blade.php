@extends('layoutshrd.hrd')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="fw-bold mb-3">📋 Laporan Absensi Pegawai</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($absensi as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->pegawai->nama ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($a->tanggal)->format('d-m-Y') }}</td>
                                    <td>
                                        @if($a->status == 'Hadir')
                                            <span class="badge bg-success">{{ $a->status }}</span>
                                        @elseif($a->status == 'Izin')
                                            <span class="badge bg-warning text-dark">{{ $a->status }}</span>
                                        @elseif($a->status == 'Sakit')
                                            <span class="badge bg-info text-dark">{{ $a->status }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $a->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $a->jam_masuk ?? '-' }}</td>
                                    <td>{{ $a->jam_keluar ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data absensi.</td>
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
