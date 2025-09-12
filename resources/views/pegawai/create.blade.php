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
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control">
                        </div>



                        <div class="mb-3">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Opsional">
                        </div>
                        <div class="mb-3">
                            <label>No Telepon</label>
                            <input type="text" name="no_telp" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Departemen</label>
                            <select name="departemen_id" class="form-control">
                                <option value="">-- Pilih Departemen --</option>
                                @foreach ($departemen as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama_departemen }}</option>
                                @endforeach
                            </select>
                        </div>


                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
