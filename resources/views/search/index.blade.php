@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Hasil pencarian: <b>{{ $query }}</b></h4>
    <hr>

    <h5>Pegawai</h5>
    @if($pegawai->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $p)
                    <tr>
                        <td>{{ $p->nip }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td>
                            {{-- Pastikan relasi ada di model Pegawai --}}
                            {{ $p->departemen ? $p->departemen->nama_departemen : '-' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p><i>Tidak ada pegawai ditemukan.</i></p>
    @endif

    <h5 class="mt-4">Departemen</h5>
    @if($departemen->isEmpty())
        <p class="text-muted fst-italic">Tidak ada departemen ditemukan.</p>
    @else
        <ul>
            @foreach($departemen as $d)
                <li>{{ $d->nama_departemen }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
