@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="mb-3">Detail HRD</h4>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">{{ $hrd->nama }}</h5>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>NIP:</strong> {{ $hrd->nip }}</p>
                        <p><strong>Jabatan:</strong> {{ $hrd->jabatan }}</p>
                        <p><strong>Departemen:</strong> {{ $hrd->departemen->nama_departemen ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>No HP:</strong> {{ $hrd->no_hp }}</p>
                        <p><strong>Alamat:</strong> {{ $hrd->alamat }}</p>
                        <p><strong>Status:</strong>
                            <span class="badge {{ $hrd->status == 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $hrd->status }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel pegawai yang di bawah HRD ini -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">Daftar Pegawai</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pegawai as $index => $p)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->nip }}</td>
                                    <td>{{ $p->jabatan }}</td>
                                    <td>{{ $p->alamat }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada pegawai di bawah HRD ini
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('admin.hrd.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
@endsection
