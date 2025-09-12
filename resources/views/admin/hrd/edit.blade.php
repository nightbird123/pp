@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Edit HRD</h4>

    <form action="{{ route('admin.hrd.update', $hrd->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $hrd->nama }}" required>
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $hrd->nip }}">
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ $hrd->jabatan }}">
        </div>

        <div class="mb-3">
            <label>Departemen</label>
            <select name="departemen_id" class="form-control">
                <option value="">-- Pilih Departemen --</option>
                @foreach(\App\Models\Departemen::all() as $departemen)
                    <option value="{{ $departemen->id }}" 
                        {{ $hrd->departemen_id == $departemen->id ? 'selected' : '' }}>
                        {{ $departemen->nama_departemen }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $hrd->email }}">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $hrd->no_hp }}">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $hrd->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="{{ $hrd->status }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('hrd.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
