@extends('layoutshrd.hrd')

@section('content')
    <div class="container-fluid px-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 welcome-card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h4 id="greeting" class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}</h4>
                            <p class="mb-0 text-muted">Semoga harimu menyenangkan ✨</p>
                        </div>
                        <div class="icon-wrapper">
                            <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.png') }}" alt="User Avatar"
                                width="60" height="60" class="rounded-circle shadow-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card card-dashboard text-white"
                    style="background: url('{{ asset('img/violet.jpeg') }}') center/cover no-repeat;">
                    <div class="card-body text-center bg-dark bg-opacity-50 rounded">
                        <i class="bi bi-people-fill fs-1 mb-2"></i>
                        <h6 class="fw-bold">Jumlah Pegawai</h6>
                        <h2 class="fw-bolder">{{ $jumlahPegawai }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard"
                    style="background: url('{{ asset('img/v1.jpeg') }}') center/cover no-repeat;">
                    <div class="card-body text-center bg-dark bg-opacity-50 rounded">
                        <i class="bi bi-building fs-1 mb-2"></i>
                        <h6 class="fw-bold">Jumlah Departemen</h6>
                        <h2 class="fw-bolder">{{ $jumlahDepartemen }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard"
                    style="background: url('{{ asset('img/v3.jpeg') }}') center/cover no-repeat;">
                    <div class="card-body text-center bg-dark bg-opacity-50 rounded">
                        <i class="bi bi-calendar-x fs-1 mb-2"></i>
                        <h6 class="fw-bold">Pegawai Hadir</h6>
                        <h2 class="fw-bolder">{{ $pegawaiHadir }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-6">
                <div class="card shadow-sm rounded-4 border-0 h-100">
                    <div class="card-header bg-white fw-semibold border-0 d-flex align-items-center">
                        <i class="bi bi-pie-chart me-2 text-primary"></i> Distribusi Pegawai per Departemen
                    </div>
                    <div class="card-body">
                        <canvas id="departemenChart" height="240"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm rounded-4 border-0 h-100">
                    <div class="card-header bg-white fw-semibold border-0 d-flex align-items-center">
                        <i class="bi bi-clock-history me-2 text-warning"></i> Aktivitas Terbaru
                    </div>
                    <div class="card-body" style="max-height: 320px; overflow-y: auto;">
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
        if (ctx) {
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($departemenLabels ?? []) !!},
                    datasets: [{
                        data: {!! json_encode($departemenData ?? []) !!},
                        backgroundColor: ['#6366f1', '#22c55e', '#f97316', '#f43f5e', '#14b8a6'],
                        borderWidth: 2,
                        borderColor: '#fff'
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
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const greetingEl = document.getElementById("greeting");
            const hour = new Date().getHours();

            let greet = "Selamat Datang";
            let emoji = "👋";

            if (hour >= 5 && hour < 11) {
                greet = "Selamat Pagi";
                emoji = "☀️";
            } else if (hour >= 11 && hour < 15) {
                greet = "Selamat Siang";
                emoji = "🌤️";
            } else if (hour >= 15 && hour < 18) {
                greet = "Selamat Sore";
                emoji = "🌇";
            } else {
                greet = "Selamat Malam";
                emoji = "🌙";
            }

            greetingEl.innerHTML = `${emoji} ${greet}, {{ Auth::user()->name }}`;
        });
    </script>
@endpush
