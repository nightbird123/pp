@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Kelola Data Departemen</h4>
    <a href="{{ route('departemen.create') }}" class="btn btn-primary mb-3">Tambah Departemen</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Departemen</th>
                <th>Jumlah Pegawai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($departemen->count() > 0)
                @foreach ($departemen as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_departemen }}</td>
                        <td>{{ $d->pegawai->count() }}</td> <!-- jumlah pegawai -->
                        <td class="text-center">
                            <a href="{{ route('departemen.show', $d->id) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                            <a href="{{ route('departemen.edit', $d->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                            <form action="{{ route('departemen.destroy', $d->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">Belum ada data departemen.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
