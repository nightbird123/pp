@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Data Cuti</h4>

    <a href="{{ route('admin.cuti.create') }}" class="btn btn-primary mb-3">+ Tambah Cuti</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Pegawai</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Jenis Cuti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cuti as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $c->pegawai->nama }}</td>
                        <td>{{ $c->tanggal_mulai }}</td>
                        <td>{{ $c->tanggal_selesai }}</td>
                        <td>{{ $c->jenis_cuti }}</td>
                        <td>{{ $c->status }}</td>
                        <td>
                            <a href="{{ route('admin.cuti.edit', $c->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.cuti.destroy', $c->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data cuti</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
