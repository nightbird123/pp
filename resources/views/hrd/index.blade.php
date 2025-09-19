@extends('layoutshrd.hrd')

@section('content')
<div class="row">
    {{-- Selamat Datang --}}
    <div class="col-lg-12 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4>Selamat Datang, {{ Auth::user()->name }}</h4>
                <p>Ini adalah Dashboard HRD</p>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="col-md-4 mb-3">
        <div class="card text-center shadow-sm border-0 bg-primary text-white">
            <div class="card-body">
                <i class="bi bi-people fs-2 mb-2"></i>
                <h5 class="card-title">Jumlah Pegawai</h5>
                <h3>{{ $jumlahPegawai ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-center shadow-sm border-0 bg-success text-white">
            <div class="card-body">
                <i class="bi bi-building fs-2 mb-2"></i>
                <h5 class="card-title">Jumlah Departemen</h5>
                <h3>{{ $jumlahDepartemen ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-center shadow-sm border-0 bg-warning text-white">
            <div class="card-body">
                <i class="bi bi-calendar-check fs-2 mb-2"></i>
                <h5 class="card-title">Pegawai Hadir Hari Ini</h5>
                <h3>{{ $pegawaiHadir ?? 0 }}</h3>
            </div>
        </div>
    </div>

    {{-- Distribusi Pegawai per Departemen --}}
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm">
            <div class="card-header">
                Distribusi Pegawai per Departemen
            </div>
            <div class="card-body">
                <canvas id="departemenChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm">
            <div class="card-header">
                Aktivitas Terbaru
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @forelse($aktivitas ?? [] as $item)
                        <li class="list-group-item">{{ $item->deskripsi }} <small class="text-muted">({{ $item->created_at->diffForHumans() }})</small></li>
                    @empty
                        <li class="list-group-item text-muted">Belum ada aktivitas</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('departemenChart');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($departemenLabels ?? []) !!},
            datasets: [{
                data: {!! json_encode($departemenData ?? []) !!},
            }]
        },
    });
</script>
@endpush
