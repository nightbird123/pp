@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Edit HRD</h4>

    <form action="{{ route('admin.hrd.update', $hrd->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $hrd->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $hrd->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.hrd.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
