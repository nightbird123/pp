@extends('layoutshrd.hrd')

@section('content')
<div class="card shadow-lg border-0 rounded-3">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0 text-primary">Kelola Data Pegawai (HRD)</h4>
            <a href="{{ route('hrd.pegawai.create') }}" 
                class="btn btn-primary rounded-pill d-flex align-items-center gap-1">
                <i class="bx bx-plus"></i> Tambah Pegawai
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Tanggal Masuk</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
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
                                <td>{{ $p->departemen->nama_departemen ?? '-' }}</td>
                                <td>{{ $p->tanggal_masuk ? \Carbon\Carbon::parse($p->tanggal_masuk)->format('d-m-Y') : '-' }}</td>
                                <td>{{ $p->no_telp ?? '-' }}</td>
                                <td>{{ $p->alamat ?? '-' }}</td>
                                <td class="text-center">
                                    <div class="dropdown dropend">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" 
                                            type="button" 
                                            id="dropdownMenuButton{{ $p->id }}" 
                                            data-bs-toggle="dropdown" 
                                            aria-expanded="false">
                                            Aksi
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $p->id }}">
                                            <li>
                                                <a class="dropdown-item text-info" 
                                                    href="{{ route('hrd.pegawai.show', $p->id) }}">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-warning" 
                                                    href="{{ route('hrd.pegawai.edit', $p->id) }}">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('hrd.pegawai.destroy', $p->id) }}" 
                                                    method="POST" class="form-hapus">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger btn-delete">
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
                            <td colspan="9" class="text-center text-muted">Belum ada data pegawai.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            let form = this.closest('form');
            Swal.fire({
                title: 'Yakin hapus?',
                text: "Data pegawai akan dihapus permanen!",
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
