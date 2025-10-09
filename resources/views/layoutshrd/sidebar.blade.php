<div id="sidebar"
     class="layout-menu vh-100 d-flex flex-column shadow-lg position-fixed top-0 start-0 transition-all"
     style="width: 260px; background-color: #0d6efd;">
    <div class="sidebar-header d-flex align-items-center justify-content-center py-3 border-bottom border-light">
        <div class="d-flex align-items-center">
            <div class="logo-circle d-flex align-items-center justify-content-center me-2"
                 style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.2);">
                <i class="bi bi-building fs-5 text-white"></i>
            </div>
            <span class="fs-5 fw-bold text-white">Dinas Pegawai</span>
        </div>
    </div>
    <div class="sidebar-menu p-3 flex-grow-1 overflow-auto">
        <h6 class="menu-section text-uppercase text-white-50 small fw-bold mb-2">Menu Utama</h6>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('hrd.dashboard') }}"
                   class="nav-link d-flex align-items-center {{ request()->routeIs('hrd.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 fs-5 me-2"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('hrd.pegawai.index') }}"
                   class="nav-link d-flex align-items-center {{ request()->routeIs('hrd.pegawai.*') ? 'active' : '' }}">
                    <i class="bi bi-people fs-5 me-2"></i> <span>Kelola Pegawai</span>
                </a>
            </li>
        </ul>

        <h6 class="menu-section text-uppercase text-white-50 small fw-bold mt-4 mb-2">Laporan</h6>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('hrd.laporan.pegawai') }}"
                   class="nav-link d-flex align-items-center {{ request()->routeIs('hrd.laporan.pegawai') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text fs-5 me-2"></i> <span>Laporan Pegawai</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('hrd.laporan.absensi') }}"
                   class="nav-link d-flex align-items-center {{ request()->routeIs('hrd.laporan.absensi') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check fs-5 me-2"></i> <span>Laporan Absensi</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('hrd.laporan.cuti') }}"
                   class="nav-link d-flex align-items-center {{ request()->routeIs('hrd.laporan.cuti') ? 'active' : '' }}">
                    <i class="bi bi-calendar-x fs-5 me-2"></i> <span>Laporan Cuti</span>
                </a>
            </li>
        </ul>

        <h6 class="menu-section text-uppercase text-white-50 small fw-bold mt-4 mb-2">Lainnya</h6>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('hrd.settings') }}"
                   class="nav-link d-flex align-items-center {{ request()->routeIs('hrd.settings') ? 'active' : '' }}">
                    <i class="bi bi-gear fs-5 me-2"></i> <span>Pengaturan</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-footer mt-auto p-3 border-top border-light">
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
<style>
    #sidebar .nav-link {
        color: rgba(255, 255, 255, 0.75);
        border-radius: 8px;
        padding: 8px 12px;
        transition: all 0.2s;
    }
    #sidebar .nav-link i {
        color: rgba(255, 255, 255, 0.75);
        transition: all 0.2s;
    }
    #sidebar .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
    #sidebar .nav-link:hover i {
        color: #fff;
    }
    #sidebar .nav-link.active {
        background-color: #fff;
        color: #0d6efd !important;
        font-weight: 600;
    }
    #sidebar .nav-link.active i {
        color: #0d6efd !important;
    }
</style>
