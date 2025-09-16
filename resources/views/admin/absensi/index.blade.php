@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="fw-bold mb-3">Data Absensi</h4>

        <a href="{{ route('admin.absensi.create') }}" class="btn btn-primary mb-3">+ Tambah Absensi</a>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>keterangan</th>
                            <th>Lainnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($absensi as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->pegawai->nama }}</td>
                                <td>{{ $a->tanggal }}</td>
                                <td>{{ $a->status }}</td>
                                <td>{{ $a->keterangan }}</td>
                                <td class="text-center">
                                    <div class="dropdown dropend">
                                        <button class="btn btn-sm btn-gradient dropdown-toggle shadow-glow" type="button"
                                            id="dropdownMenuButton{{ $a->id }}" data-bs-toggle="dropdown"
                                            data-bs-boundary="viewport" aria-expanded="false">
                                            <i class="bi bi-magic"></i> Aksi
                                        </button>
                                        <ul class="dropdown-menu animate-dropdown"
                                            aria-labelledby="dropdownMenuButton{{ $a->id }}">

                                            {{-- 🔍 Detail --}}
                                            <li>
                                                <a class="dropdown-item text-info"
                                                    href="{{ route('admin.absensi.show', $a->id) }}">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                            </li>

                                            {{-- ✏️ Edit --}}
                                            <li>
                                                <a class="dropdown-item text-warning"
                                                    href="{{ route('admin.absensi.edit', $a->id) }}">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                            </li>

                                            {{-- 🗑 Hapus --}}
                                            <li>
                                                <form action="{{ route('admin.absensi.destroy', $a->id) }}" method="POST"
                                                    class="form-hapus">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data absensi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
