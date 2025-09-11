@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="fw-bold mb-3">Laporan Data Pegawai</h4>

                {{-- Filter Departemen --}}
                <form method="GET" action="{{ route('laporan.index') }}" class="mb-3 d-flex align-items-center">
                    <select name="departemen_id" class="form-select me-2" style="width: 200px;">
                        <option value="">-- Semua Departemen --</option>
                        @foreach($departemens as $d)
                            <option value="{{ $d->id }}" {{ request('departemen_id') == $d->id ? 'selected' : '' }}>
                                {{ $d->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary me-2">Filter</button>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Reset</a>
                </form>

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
                            @foreach($pegawai as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> {{-- Loop iteration --}}
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->nip }}</td>
                                    <td>{{ $p->jabatan }}</td>
                                    <td>{{ $p->departemen ? $p->departemen->nama_departemen : '-' }}</td>
                                    <td>{{ $p->tanggal_masuk ? $p->tanggal_masuk->format('d-m-Y') : '-' }}</td>
                                </tr>
                            
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data pegawai.</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
