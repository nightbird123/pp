<div class="layout-menu bg-primary text-white vh-100 p-3 d-flex flex-column shadow-sm position-fixed top-0 start-0" style="width: 250px;">
    <!-- Logo -->
    <div class="d-flex align-items-center justify-content-center mb-4 mt-2">
        <a href="{{ route('hrd.dashboard') }}" class="d-flex align-items-center text-white text-decoration-none">
            <img src="{{ asset('images/laravel.svg') }}" alt="Laravel Logo" width="34" height="34" class="me-2">
            <span class="fs-5 fw-bold">Dinas Pegawai</span>
        </a>
    </div>

    <!-- MENU -->
    <ul class="nav flex-column flex-grow-1">
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.dashboard') }}"
               class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('hrd.dashboard') ? 'bg-light text-primary fw-semibold' : 'text-white-50' }}">
                <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.pegawai.index') }}"
               class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('hrd.pegawai.*') ? 'bg-light text-primary fw-semibold' : 'text-white-50' }}">
                <i class="bi bi-people"></i> <span>Kelola Pegawai</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.laporan.pegawai') }}"
               class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('hrd.laporan.pegawai') ? 'bg-light text-primary fw-semibold' : 'text-white-50' }}">
                <i class="bi bi-file-earmark-text"></i> <span>Laporan Pegawai</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.laporan.absensi') }}"
               class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('hrd.laporan.absensi') ? 'bg-light text-primary fw-semibold' : 'text-white-50' }}">
                <i class="bi bi-calendar-check"></i> <span>Laporan Absensi</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.laporan.cuti') }}"
               class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('hrd.laporan.cuti') ? 'bg-light text-primary fw-semibold' : 'text-white-50' }}">
                <i class="bi bi-calendar-x"></i> <span>Laporan Cuti</span>
            </a>
        </li>
        <li class="nav-item mt-3 mb-2">
            <a href="{{ route('hrd.settings') }}"
               class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('hrd.settings') ? 'bg-light text-primary fw-semibold' : 'text-white-50' }}">
                <i class="bi bi-gear"></i> <span>Pengaturan</span>
            </a>
        </li>
    </ul>

    <!-- Logout -->
    <div class="mt-auto pt-3 border-top border-light-subtle">
        <a href="{{ route('logout') }}"
           class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center gap-2"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i> Keluar
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
