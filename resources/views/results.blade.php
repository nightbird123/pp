@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Hasil Pencarian: "{{ $query }}"</h4>

    @if($results->count())
        <ul class="list-group mt-3">
            @foreach($results as $item)
                <li class="list-group-item">
                    <strong>{{ $item->nama }}</strong> - {{ $item->nip }}
                </li>
            @endforeach
        </ul>
    @else
        <p class="mt-3 text-muted">Tidak ada hasil ditemukan.</p>
    @endif
</div>
@endsection
