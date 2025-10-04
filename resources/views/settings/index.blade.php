@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Pengaturan</h4>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

 <form action="{{ route('settings.update') }}" method="POST">
    @csrf
    @method('PUT')


    <!-- Pilihan Tema -->
    <div class="mb-3">
      <label for="theme" class="form-label">Tema</label>
      <select name="theme" id="theme" class="form-select">
        <option value="light" {{ session('theme') == 'light' ? 'selected' : '' }}>Light</option>
        <option value="dark" {{ session('theme') == 'dark' ? 'selected' : '' }}>Dark</option>
        <option value="system" {{ session('theme') == 'system' ? 'selected' : '' }}>System</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="language" class="form-label">Bahasa</label>
      <select name="language" id="language" class="form-select">
        <option value="id" {{ session('language') == 'id' ? 'selected' : '' }}>Indonesia</option>
        <option value="en" {{ session('language') == 'en' ? 'selected' : '' }}>English</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection
