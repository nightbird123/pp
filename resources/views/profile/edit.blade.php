@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Profil</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- gunakan PUT sesuai standar update --}}

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name" 
                           value="{{ old('name', $user->name) }}" 
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" 
                           value="{{ old('email', $user->email) }}" 
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Foto Profil --}}
                <div class="mb-3">
                    <label for="profile_photo" class="form-label">Foto Profil</label><br>
                    <img src="{{ $user->profile_photo 
                                ? asset('storage/' . $user->profile_photo) 
                                : asset('vendor/images/avatars/violet.jpg') }}" 
                         alt="Foto Profil"
                         class="rounded-circle mb-2 border" 
                         width="100" height="100">
                    <input type="file" id="profile_photo" name="profile_photo" 
                           class="form-control @error('profile_photo') is-invalid @enderror">
                    @error('profile_photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
