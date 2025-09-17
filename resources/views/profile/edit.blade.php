@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Edit Profil</h4>
  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
    </div>
    <div class="mb-3">
      <label>Foto Profil</label><br>
      <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('vendor/images/avatars/user.png') }}"
           class="rounded-circle mb-2" width="80" height="80">
      <input type="file" name="profile_photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection
