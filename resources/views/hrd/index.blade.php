@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4>Selamat Datang, {{ Auth::user()->name }}</h4>
                <p>Ini adalah Dashboard hrd</p>
            </div>
        </div>
    </div>
</div>
@endsection
