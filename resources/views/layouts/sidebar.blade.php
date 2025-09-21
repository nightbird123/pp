<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-3">
        <a href="{{ Auth::user()->role == 'admin' ? url('/admin/dashboard') : url('/hrd/dashboard') }}"
            class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- Logo SVG putih -->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white"
                    class="bi bi-people-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8
        m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10
        8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
            </span>
            <span class="app-brand-text fw-bold ms-2 text-white">Dinas Pegawai</span>

        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ Auth::user()->role == 'admin' ? url('/admin/dashboard') : url('/hrd/dashboard') }}"
                class="menu-link">
                <i class="menu-icon ti ti-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
            <!-- Menu khusus Admin -->
            <li class="menu-item">
                <a href="{{ route('pegawai.index') }}" class="menu-link">
                    <i class="menu-icon ti ti-users"></i>
                    <div>Kelola Pegawai</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('departemen.index') }}" class="menu-link">
                    <i class="menu-icon ti ti-building"></i>
                    <div>Kelola Departemen</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.hrd.index') }}" class="menu-link">
                    <i class="menu-icon ti ti-id-badge"></i>
                    <div>Kelola HRD</div>
                </a>
            </li>

            <!-- Header Laporan -->
            <li class="menu-header small text-uppercase">Laporan</li>

            <li class="menu-item">
                <a href="{{ route('admin.laporan.pegawai') }}" class="menu-link">
                    <i class="menu-icon ti ti-file-text"></i>
                    <div>Laporan Pegawai</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.laporan.absensi') }}" class="menu-link">
                    <i class="menu-icon ti ti-calendar-check"></i>
                    <div>Laporan Absensi</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.laporan.cuti') }}" class="menu-link">
                    <i class="menu-icon ti ti-calendar-exclamation"></i>
                    <div>Laporan Cuti</div>
                </a>
            </li>
        @elseif(Auth::user()->role == 'hrd')
            <!-- Menu khusus HRD -->
            <li class="menu-item">
                <a href="{{ route('pegawai.index') }}" class="menu-link">
                    <i class="menu-icon ti ti-users"></i>
                    <div>Kelola Pegawai</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
