@extends('layouts.app')

@section('content')
<div class="row g-4">
    {{-- Jumlah Pegawai --}}
    <div class="col-md-4">
        <div class="card text-center dashboard-card card-pegawai">
            <div class="card-body py-4">
                <i class="bi bi-people fs-1 mb-3 d-block"></i>
                <h6 class="fw-bold">Jumlah Pegawai</h6>
                <h2 class="fw-bolder">{{ $jumlahPegawai }}</h2>
            </div>
        </div>
    </div>

    {{-- Jumlah Departemen --}}
    <div class="col-md-4">
        <div class="card text-center dashboard-card card-departemen">
            <div class="card-body py-4">
                <i class="bi bi-building fs-1 mb-3 d-block"></i>
                <h6 class="fw-bold">Jumlah Departemen</h6>
                <h2 class="fw-bolder">{{ $totalDepartemen }}</h2>
            </div>
        </div>
    </div>

    {{-- Jumlah HRD --}}
    <div class="col-md-4">
        <div class="card text-center dashboard-card card-hrd">
            <div class="card-body py-4">
                <i class="bi bi-person-workspace fs-1 mb-3 d-block"></i>
                <h6 class="fw-bold">Jumlah HRD</h6>
                <h2 class="fw-bolder">{{ $jumlahHrd }}</h2>
            </div>
        </div>
    </div>

    {{-- Pegawai Hadir Hari Ini --}}
    <div class="col-md-6">
        <div class="card text-center dashboard-card card-hadir">
            <div class="card-body py-4">
                <i class="bi bi-person-check fs-1 mb-3 d-block"></i>
                <h6 class="fw-bold">Pegawai Hadir Hari Ini</h6>
                <h2 class="fw-bolder">{{ $jumlahHadir }}</h2>
            </div>
        </div>
    </div>

    {{-- Pegawai Cuti Hari Ini --}}
    <div class="col-md-6">
        <div class="card text-center dashboard-card card-cuti">
            <div class="card-body py-4">
                <i class="bi bi-calendar-x fs-1 mb-3 d-block"></i>
                <h6 class="fw-bold">Pegawai Cuti Hari Ini</h6>
                <h2 class="fw-bolder">{{ $jumlahCuti }}</h2>
            </div>
        </div>
    </div>
</div>

{{-- Kalau data pegawai masih kosong --}}
@if ($jumlahPegawai == 0)
    <div class="alert alert-warning mt-4 text-center rounded-3 shadow-sm">
        <i class="bi bi-exclamation-circle"></i> Belum ada data pegawai yang terdaftar.
    </div>
@endif

{{-- Grafik & Aktivitas --}}
<div class="row mt-5">
    {{-- Grafik Distribusi --}}
    <div class="col-lg-6 mb-4">
        <div class="card shadow-lg rounded-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Distribusi Pegawai per Departemen</h5>
                <canvas id="pegawaiChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Aktivitas Terbaru + Tren Aktivitas --}}
    <div class="col-lg-6 mb-4">
        <div class="card shadow-lg rounded-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold">Aktivitas Terbaru</h5>
                    <form id="resetForm" action="{{ route('aktivitas.reset') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" id="resetButton" class="btn btn-sm btn-danger rounded-pill">
                            <i class="bi bi-x-circle"></i> Reset
                        </button>
                    </form>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($aktivitasTerbaru as $aktivitas)
                        <li class="list-group-item border-0 ps-0">
                            <div class="d-flex align-items-start">
                                <span class="badge bg-primary rounded-circle me-3 p-2">
                                    <i class="bi bi-person-plus"></i>
                                </span>
                                <div>
                                    <div class="fw-semibold">{{ $aktivitas->deskripsi }}</div>
                                    <small class="text-muted">{{ $aktivitas->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item text-muted border-0">Belum ada aktivitas.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        {{-- Grafik Tren Aktivitas --}}
        <div class="card shadow-sm border-0 rounded-3 mt-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Tren Aktivitas (7 Hari Terakhir)</h5>
                <canvas id="aktivitasChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>


{{-- Script Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Donut Chart (Distribusi Pegawai per Departemen)
    const ctx1 = document.getElementById('pegawaiChart');
    if (ctx1) {
        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($distribusi->pluck('nama_departemen')) !!},
                datasets: [{
                    data: {!! json_encode($distribusi->pluck('pegawai_count')) !!},
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#ec4899'],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { font: { weight: 'bold' } }
                    }
                }
            }
        });
    }

    // Line Chart Tren Aktivitas
    const ctx2 = document.getElementById('aktivitasChart');
    if (ctx2) {
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($trenAktivitas)) !!}, 
                datasets: [{
                    label: 'Jumlah Aktivitas',
                    data: {!! json_encode(array_values($trenAktivitas)) !!},
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.2)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' }
                },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1 } }
                }
            }
        });
    }
</script>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('resetButton').addEventListener('click', function() {
        Swal.fire({
            title: 'Yakin reset semua aktivitas?',
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, reset sekarang',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('resetForm').submit();
            }
        })
    });
</script>

{{-- Custom Style --}}
<style>
    .dashboard-card {
        border-radius: 1rem;
        color: #fff;
    }
    .card-pegawai { background: linear-gradient(135deg, #3b82f6, #1d4ed8); }
    .card-departemen { background: linear-gradient(135deg, #8b5cf6, #6d28d9); }
    .card-hrd { background: linear-gradient(135deg, #ec4899, #be185d); }
    .card-hadir { background: linear-gradient(135deg, #10b981, #047857); }
    .card-cuti { background: linear-gradient(135deg, #6b7280, #374151); }
</style>
@endsection
