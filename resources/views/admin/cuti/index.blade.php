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
                        <th>Lainnya</th>
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
                          <td class="text-center">
                                    <div class="dropdown dropend">
                                        <button class="btn btn-sm btn-gradient dropdown-toggle shadow-glow" type="button"
                                            id="dropdownMenuButton{{ $c->id }}" data-bs-toggle="dropdown"
                                            data-bs-boundary="viewport" aria-expanded="false">
                                            <i class="bi bi-magic"></i> Aksi
                                        </button>
                                        <ul class="dropdown-menu animate-dropdown"
                                            aria-labelledby="dropdownMenuButton{{ $c->id }}">

                                            {{-- 🔍 Detail --}}
                                            <li>
                                                <a class="dropdown-item text-info"
                                                    href="{{ route('admin.cuti.show', $c->id) }}">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                            </li>

                                            {{-- ✏️ Edit --}}
                                            <li>
                                                <a class="dropdown-item text-warning"
                                                    href="{{ route('admin.cuti.edit', $c->id) }}">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                            </li>

                                            {{-- 🗑 Hapus --}}
                                            <li>
                                                <form action="{{ route('admin.cuti.destroy', $c->id) }}" method="POST"
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
                        <td colspan="7" class="text-center">Belum ada data cuti</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
