@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-body">
                <h4 class="fw-bold mb-3">Edit Pegawai</h4>

                <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ $pegawai->jabatan }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Departemen</label>
                        <select name="departemen_id" class="form-control">
                            @foreach($departemen as $d)
                                <option value="{{ $d->id }}" {{ $pegawai->departemen_id == $d->id ? 'selected' : '' }}>
                                    {{ $d->nama_departemen }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $pegawai->alamat }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text" name="no_telp" class="form-control" value="{{ $pegawai->no_telp }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control" 
                            value="{{ $pegawai->tanggal_masuk }}">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
