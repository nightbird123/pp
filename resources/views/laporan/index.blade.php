@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="fw-bold mb-3">Laporan Data</h4>

                {{-- Filter Departemen --}}
                <form method="GET" action="{{ route('laporan.index') }}" class="mb-3 d-flex align-items-center">
                    <select name="departemen_id" class="form-select me-2" style="width: 200px;">
                        <option value="">-- Semua Departemen --</option>
                        @foreach($departemen as $d)
                            <option value="{{ $d->id }}" {{ request('departemen_id') == $d->id ? 'selected' : '' }}>
                                {{ $d->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary me-2">Filter</button>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Reset</a>
                </form>

                {{-- Tabs untuk laporan --}}
                <ul class="nav nav-tabs mb-3" id="laporanTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pegawai-tab" data-bs-toggle="tab" data-bs-target="#pegawai" type="button" role="tab">
                            Pegawai
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="absensi-tab" data-bs-toggle="tab" data-bs-target="#absensi" type="button" role="tab">
                            Absensi
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cuti-tab" data-bs-toggle="tab" data-bs-target="#cuti" type="button" role="tab">
                            Cuti
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="laporanTabContent">

                    {{-- Pegawai --}}
                    <div class="tab-pane fade show active" id="pegawai" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Jabatan</th>
                                        <th>Departemen</th>
                                        <th>Tanggal Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pegawai as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->nip }}</td>
                                            <td>{{ $p->jabatan }}</td>
                                            <td>{{ $p->departemen->nama_departemen ?? '-' }}</td>
                                            <td>{{ $p->tanggal_masuk ? \Carbon\Carbon::parse($p->tanggal_masuk)->format('d-m-Y') : '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Belum ada data pegawai.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Absensi --}}
                    <div class="tab-pane fade" id="absensi" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(($absensi ?? collect()) as $a)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $a->pegawai->nama ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($a->tanggal)->format('d-m-Y') }}</td>
                                            <td>{{ $a->status ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada data absensi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Cuti --}}
                    <div class="tab-pane fade" id="cuti" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(($cuti ?? collect()) as $c)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $c->pegawai->nama ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($c->tanggal_mulai)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($c->tanggal_selesai)->format('d-m-Y') }}</td>
                                            <td>{{ $c->keterangan ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Belum ada data cuti.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div> {{-- end tab-content --}}
            </div>
        </div>
    </div>
</div>
@endsection
