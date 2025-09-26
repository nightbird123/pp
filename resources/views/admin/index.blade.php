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

{{-- Donut + Aktivitas + Tren Aktivitas --}}
<div class="row mt-5">
    {{-- Donut Chart --}}
    <div class="col-lg-6 mb-4">
        <div class="card shadow-lg rounded-4 h-100">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Distribusi Pegawai per Departemen</h5>
                <canvas id="pegawaiChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Aktivitas Terbaru + Tren Aktivitas --}}
    <div class="col-lg-6 mb-4 d-flex flex-column">
        {{-- Aktivitas Terbaru --}}
        <div class="card shadow-lg rounded-4 mb-4 flex-fill">
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
                <ul class="list-group list-group-flush" style="max-height:200px; overflow-y:auto;">
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

        {{-- Tren Aktivitas --}}
        <div class="card shadow-lg rounded-4 flex-fill">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Tren Aktivitas (7 Hari Terakhir)</h5>
                <canvas id="aktivitasChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- Row baru: Cuti Pending + Leaderboard --}}
<div class="row mt-4 d-flex align-items-stretch">
    {{-- CUTI PENDING --}}
    <div class="col-lg-6 mb-4 d-flex">
        <div class="card shadow-sm border-0 rounded-3 flex-fill h-100">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Cuti Pending</h5>
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cutiPendingList as $c)
                            <tr>
                                <td>{{ $c->pegawai->nama }}</td>
                                <td>{{ $c->tanggal_mulai }}</td>
                                <td>{{ $c->tanggal_selesai }}</td>
                                <td><span class="badge bg-warning text-dark">{{ $c->status }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Tidak ada cuti pending.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-end">
                    <a href="{{ route('admin.cuti.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>

    {{-- LEADERBOARD KEHADIRAN --}}
    <div class="col-lg-6 mb-4 d-flex">
        <div class="card shadow-sm border-0 rounded-3 flex-fill h-100">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Top 5 Kehadiran Bulan Ini</h5>
                <ul class="list-group list-group-flush">
                    @forelse($leaderboard as $rank => $peg)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $rank+1 }}. {{ $peg->nama }}</span>
                            <span class="badge bg-success rounded-pill">{{ $peg->absensi_count }} hadir</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">Belum ada data kehadiran.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- MOTIVASI HARIAN --}}
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="alert alert-info text-center rounded-pill shadow-sm fw-semibold">
            <i class="bi bi-lightbulb me-2"></i> 
            <span class="fw-bold">Motivasi Hari Ini:</span> {{ $motivasi }}
        </div>
    </div>
</div>


{{-- Script Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Donut Chart
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
