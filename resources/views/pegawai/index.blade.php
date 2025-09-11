@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="fw-bold mb-3">Kelola Data Pegawai</h4>

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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nip }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->jabatan }}</td>
                                    <td>{{ $p->departemen ? $p->departemen->nama_departemen : '-' }}</td>
                                    <td>{{ $p->tanggal_masuk ? $p->tanggal_masuk->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $p->no_telp ?? '-' }}</td>
                                   
                                    <td>{{ $p->alamat ?? '-' }}</td>
                                </tr>
                           
                                <tr>
                                    <td colspan="9" class="text-center">Belum ada data pegawai.</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
