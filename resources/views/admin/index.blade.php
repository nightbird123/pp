@extends('layouts.app')

@section('content')
    <div class="row">
        {{-- Kartu Statistik --}}
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm border-0 bg-primary text-white">
                <div class="card-body">
                    <i class="bi bi-people fs-2 mb-2"></i>
                    <h6 class="fw-bold">Jumlah Pegawai</h6>
                    <h3>{{ $jumlahPegawai }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm border-0 bg-success text-white">
                <div class="card-body">
                    <i class="bi bi-building fs-2 mb-2"></i>
                    <h6 class="fw-bold">Jumlah Departemen</h6>
                    <h3>{{ $totalDepartemen }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm border-0 bg-info text-white">
                <div class="card-body">
                    <i class="bi bi-person-workspace fs-2 mb-2"></i>
                    <h6 class="fw-bold">Jumlah HRD</h6>
                    <h3>{{ $jumlahHrd }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Kalau data pegawai masih kosong --}}
    @if ($jumlahPegawai == 0)
        <div class="alert alert-warning mt-3 text-center">
            Belum ada data pegawai yang terdaftar.
        </div>
    @endif

    {{-- Tempat grafik atau aktivitas terbaru (optional) --}}
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Distribusi Pegawai per Departemen</h5>
                    <canvas id="pegawaiChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6"> {{-- Ubah ke col-lg-6 supaya sejajar --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Aktivitas Terbaru</h5>
                    <ul class="list-group">
                        @forelse($aktivitasTerbaru as $aktivitas)
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-plus text-primary me-2"></i>
                                <div>
                                    {{ $aktivitas->deskripsi }}
                                    <small class="text-muted d-block">{{ $aktivitas->created_at->diffForHumans() }}</small>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">Belum ada aktivitas.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm border-0 bg-warning text-white">
                    <div class="card-body">
                        <i class="bi bi-person-check fs-2 mb-2"></i>
                        <h6 class="fw-bold">Pegawai Hadir Hari Ini</h6>
                        <h3>{{ $jumlahHadir }}</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- Script Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('pegawaiChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['IT', 'HRD', 'Keuangan', 'Umum'],
                        datasets: [{
                            data: [10, 5, 8, 6],
                            backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444']
                        }]
                    }
                });
            }
        });
    </script>
@endsection
