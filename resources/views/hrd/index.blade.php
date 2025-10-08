@extends('layoutshrd.hrd')

@section('content')
<div class="container-fluid px-4">
    {{-- Header --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-3 bg-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="fw-bold mb-1 text-dark">Selamat Datang, {{ Auth::user()->name }}</h4>
                        <p class="mb-0 text-muted">Berikut ringkasan singkat hari ini ✨</p>
                    </div>
                    <i class="bi bi-speedometer2 text-primary fs-1"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card text-center border-0 shadow-sm rounded-4 bg-gradient" style="background: linear-gradient(135deg, #6366f1, #8b5cf6); color: #fff;">
                <div class="card-body py-4">
                    <i class="bi bi-people fs-1 mb-3"></i>
                    <h6 class="fw-semibold mb-1">Jumlah Pegawai</h6>
                    <h2 class="fw-bold mb-0">{{ $jumlahPegawai ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center border-0 shadow-sm rounded-4 bg-gradient" style="background: linear-gradient(135deg, #10b981, #34d399); color: #fff;">
                <div class="card-body py-4">
                    <i class="bi bi-building fs-1 mb-3"></i>
                    <h6 class="fw-semibold mb-1">Jumlah Departemen</h6>
                    <h2 class="fw-bold mb-0">{{ $jumlahDepartemen ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center border-0 shadow-sm rounded-4 bg-gradient" style="background: linear-gradient(135deg, #f59e0b, #fbbf24); color: #fff;">
                <div class="card-body py-4">
                    <i class="bi bi-calendar-check fs-1 mb-3"></i>
                    <h6 class="fw-semibold mb-1">Pegawai Hadir Hari Ini</h6>
                    <h2 class="fw-bold mb-0">{{ $pegawaiHadir ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart dan Aktivitas --}}
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-header bg-white fw-semibold border-0">
                    <i class="bi bi-pie-chart me-2 text-primary"></i> Distribusi Pegawai per Departemen
                </div>
                <div class="card-body">
                    <canvas id="departemenChart" height="240"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-header bg-white fw-semibold border-0">
                    <i class="bi bi-clock-history me-2 text-warning"></i> Aktivitas Terbaru
                </div>
                <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                    <ul class="list-group list-group-flush">
                        @forelse($aktivitas ?? [] as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $item->deskripsi }}</span>
                                <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                            </li>
                        @empty
                            <li class="list-group-item text-muted text-center py-3">Belum ada aktivitas 😴</li>
                        @endforelse
                    </ul>
                </div>
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
                backgroundColor: ['#6366f1','#22c55e','#f97316','#f43f5e','#14b8a6']
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 15,
                        padding: 15
                    }
                }
            }
        }
    });
</script>
@endpush
