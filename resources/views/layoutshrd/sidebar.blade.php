<div class="sidebar bg-primary text-white vh-100 p-3">
    <h4 class="mb-4">Dinas Pegawai</h4>
    <ul class="nav flex-column">
        {{-- Dashboard --}}
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.dashboard') }}" 
               class="nav-link text-white {{ request()->routeIs('hrd.dashboard') ? 'fw-bold active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        {{-- Kelola Pegawai --}}
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.pegawai.index') }}" 
               class="nav-link text-white {{ request()->routeIs('hrd.pegawai.*') ? 'fw-bold active' : '' }}">
                <i class="bi bi-people"></i> Kelola Pegawai
            </a>
        </li>

        {{-- Laporan --}}
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.laporan.pegawai') }}" 
               class="nav-link text-white {{ request()->routeIs('hrd.laporan.*') ? 'fw-bold active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Laporan Pegawai
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.laporan.absensi') }}" 
               class="nav-link text-white {{ request()->routeIs('hrd.laporan.absensi') ? 'fw-bold active' : '' }}">
                <i class="bi bi-calendar-check"></i> Laporan Absensi
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('hrd.laporan.cuti') }}" 
               class="nav-link text-white {{ request()->routeIs('hrd.laporan.cuti') ? 'fw-bold active' : '' }}">
                <i class="bi bi-calendar-x"></i> Laporan Cuti
            </a>
        </li>
    </ul>
</div>
