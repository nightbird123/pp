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
        <a href="{{ route('admin.hrd.create') }}" class="btn btn-primary mb-3">Tambah HRD</a>

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
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Jumlah Pegawai</th>
                        <th>Lainnya</th>
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
                            <td>{{ $h->alamat }}</td>
                            <td>{{ $h->status }}</td>
                            <td>{{ $jumlahPegawai[$h->id] ?? 0 }}</td>
                            <td class="text-center">
                                <div class="dropdown dropend">
                                    <button class="btn btn-sm btn-gradient dropdown-toggle shadow-glow" type="button"
                                        id="dropdownMenuButton{{ $h->id }}" data-bs-toggle="dropdown"
                                        data-bs-boundary="viewport" {{-- 🔑 ini penting --}} aria-expanded="false">
                                        <i class="bi bi-magic"></i> Aksi
                                    </button>
                                    <ul class="dropdown-menu animate-dropdown"
                                        aria-labelledby="dropdownMenuButton{{ $h->id }}">
                                        <li>
                                            <a class="dropdown-item text-info"
                                                href="{{ route('admin.hrd.show', $h->id) }}">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-warning"
                                                href="{{ route('admin.hrd.edit', $h->id) }}">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.hrd.destroy', $h->id) }}" method="POST"
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
                            <td colspan="10" class="text-center">Belum ada data HRD</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
    @push('styles')
        <style>
            .table-responsive {
                overflow: visible !important;
            }
        </style>
    @endpush
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    let form = this.closest('form');

                    Swal.fire({
                        title: 'Yakin hapus?',
                        text: "Data HRD ini akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
