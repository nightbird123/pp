@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Kelola HRD</h4>

    <!-- Ringkasan -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total Pegawai</h6>
                    <h3>{{ $totalPegawai }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total HRD</h6>
                    <h3>{{ $totalHrd }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total Departemen</h6>
                    <h3>{{ $totalDepartemen }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Tambah HRD -->
    <a href="{{ route('hrd.create') }}" class="btn btn-primary mb-3">Tambah HRD</a>

    <!-- Tabel HRD -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Jumlah Pegawai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hrd as $key => $h)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $h->nama }}</td>
                    <td>{{ $h->nip }}</td>
                    <td>{{ $h->jabatan }}</td>
                    <td>{{ $h->departemen->nama_departemen ?? '-' }}</td>
                    <td>{{ $h->email }}</td>
                    <td>{{ $h->no_hp }}</td>
                    <td>{{ $h->alamat }}</td>
                    <td>{{ $h->status }}</td>
                    <td>{{ $jumlahPegawai[$h->id] ?? 0 }}</td>
                    <td>
                        <a href="{{ route('hrd.show', $h->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('hrd.edit', $h->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('hrd.destroy', $h->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center">Belum ada data HRD</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
