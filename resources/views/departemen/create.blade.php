@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Tambah Departemen</h4>

        <form action="{{ route('departemen.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Departemen</label>
                <input type="text" name="nama_departemen" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
