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
                @if ($departemen->count() > 0)
                    @foreach ($departemen as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama_departemen }}</td>
                            <td>{{ $d->pegawai_count }}</td>
                            <!-- jumlah pegawai -->
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <!-- Detail -->
                                    <a href="{{ route('departemen.show', $d->id) }}"
                                        class="btn btn-sm btn-outline-secondary rounded-pill d-flex align-items-center gap-1"
                                        title="Detail">
                                        <i class="bx bx-show"></i> Detail
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('departemen.edit', $d->id) }}"
                                        class="btn btn-sm btn-warning rounded-pill text-white d-flex align-items-center gap-1"
                                        title="Edit">
                                        <i class="bx bx-edit-alt"></i> Edit
                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('departemen.destroy', $d->id) }}" method="POST"
                                        class="d-inline form-hapus">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-danger rounded-pill d-flex align-items-center gap-1">
                                            <i class="bx bx-trash"></i> Hapus
                                        </button>
                                    </form>

                                </div>
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
