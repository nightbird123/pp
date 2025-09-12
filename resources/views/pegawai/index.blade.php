@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold mb-0">Kelola Data Pegawai</h4>
                        <a href="{{ route('pegawai.create') }}"
                            class="btn btn-primary rounded-pill d-flex align-items-center gap-1">
                            <i class="bx bx-plus"></i> Tambah Pegawai
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Departemen</th>
                                    <th>Tanggal Masuk</th>
                                    <th>No. Telepon</th>
                                    <th>Alamat</th>
                                    <th>Lainnya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pegawai->count() > 0)
                                    @foreach ($pegawai as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->nip }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->jabatan }}</td>
                                            <td>{{ $p->departemen ? $p->departemen->nama_departemen : '-' }}</td>
                                            <td>{{ $p->tanggal_masuk ? \Carbon\Carbon::parse($p->tanggal_masuk)->format('d-m-Y') : '-' }}
                                            </td>

                                            <td>{{ $p->no_telp ?? '-' }}</td>
                                            <td>{{ $p->alamat ?? '-' }}</td>

                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <!-- Detail -->
                                                    <a href="{{ route('pegawai.show', $p->id) }}"
                                                        class="btn btn-sm btn-outline-secondary rounded-pill d-flex align-items-center gap-1"
                                                        title="Detail">
                                                        <i class="bx bx-show"></i> Detail
                                                    </a>

                                                    <!-- Edit -->
                                                    <a href="{{ route('pegawai.edit', $p->id) }}"
                                                        class="btn btn-sm btn-warning rounded-pill text-white d-flex align-items-center gap-1"
                                                        title="Edit">
                                                        <i class="bx bx-edit-alt"></i> Edit
                                                    </a>

                                                    <!-- Hapus -->
                                                    <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST"
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
                                        <td colspan="9" class="text-center">Belum ada data pegawai.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
