@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Tambah Pegawai</h4>

                <form action="{{ route('pegawai.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control">
                    </div>
                     <div class="mb-3">
                        <label>Departemen</label>
                        <input type="text" name="departemen" class="form-control">
                    </div>
                     <div class="mb-3">
                        <label>tanggal masuk</label>
                        <input type="text" name="tanggal_masuk" class="form-control">
                    </div>
                     <div class="mb-3">
                        <label>No Telepon</label>
                        <input type="text" name="no_telp" class="form-control">
                    </div>
                     <div class="mb-3">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
