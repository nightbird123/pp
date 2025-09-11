@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Departemen</h4>

    <form action="{{ route('departemen.update', $departemen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_departemen" class="form-label">Nama Departemen</label>
            <input type="text" name="nama_departemen" class="form-control" value="{{ $departemen->nama_departemen }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('departemen.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
