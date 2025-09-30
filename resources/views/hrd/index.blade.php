@extends('layoutshrd.hrd')

@section('content')
<div class="row">
    {{-- Selamat Datang --}}
    <div class="col-lg-12 mb-4">
        <div class="card border-0 shadow-sm rounded-3 bg-light">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}</h4>
                    <p class="mb-0 text-muted">Berikut Ringkasan Singkat</p>
                </div>
                <i class="bi bi-speedometer2 text-primary fs-1"></i>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="col-md-4 mb-3">
        <div class="card text-center border-0 shadow-sm rounded-3 bg-gradient bg-primary text-white">
            <div class="card-body py-4">
                <i class="bi bi-people fs-1 mb-3"></i>
                <h5 class="fw-semibold">Jumlah Pegawai</h5>
                <h2 class="fw-bold">{{ $jumlahPegawai ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-center border-0 shadow-sm rounded-3 bg-gradient bg-success text-white">
            <div class="card-body py-4">
                <i class="bi bi-building fs-1 mb-3"></i>
                <h5 class="fw-semibold">Jumlah Departemen</h5>
                <h2 class="fw-bold">{{ $jumlahDepartemen ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-center border-0 shadow-sm rounded-3 bg-gradient bg-warning text-white">
            <div class="card-body py-4">
                <i class="bi bi-calendar-check fs-1 mb-3"></i>
                <h5 class="fw-semibold">Pegawai Hadir Hari Ini</h5>
                <h2 class="fw-bold">{{ $pegawaiHadir ?? 0 }}</h2>
            </div>
        </div>
    </div>

    {{-- Distribusi Pegawai per Departemen --}}
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm rounded-3 border-0">
            <div class="card-header fw-semibold bg-white border-0">
                Distribusi Pegawai per Departemen
            </div>
            <div class="card-body">
                <canvas id="departemenChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm rounded-3 border-0">
            <div class="card-header fw-semibold bg-white border-0">
                Aktivitas Terbaru
            </div>
            <div class="card-body" style="max-height:300px; overflow-y:auto;">
                <ul class="list-group list-group-flush">
                    @forelse($aktivitas ?? [] as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $item->deskripsi }}</span>
                            <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                        </li>
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
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b']
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>
@endpush
