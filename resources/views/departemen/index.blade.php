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
                                <div class="dropdown dropstart">
                                    <button class="btn btn-sm btn-gradient dropdown-toggle shadow-glow" type="button"
                                        id="dropdownMenuButton{{ $d->id }}" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bi bi-magic"></i> Aksi
                                    </button>

                                    <ul class="dropdown-menu animate-dropdown"
                                        aria-labelledby="dropdownMenuButton{{ $d->id }}">
                                        <li>
                                            <a class="dropdown-item text-info"
                                                href="{{ route('departemen.show', $d->id) }}">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-warning"
                                                href="{{ route('departemen.edit', $d->id) }}">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('departemen.destroy', $d->id) }}" method="POST"
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
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data departemen.</td>
                    </tr>
                @endif
            </tbody>
        </table>
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
