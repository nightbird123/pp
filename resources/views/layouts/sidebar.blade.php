<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-3">
        <a href="{{ Auth::user()->role == 'admin' ? url('/admin/dashboard') : url('/hrd/dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- logo svg -->
            </span>
            <span class="app-brand-text fw-bold ms-2">Dinas Pegawai</span>
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
            <a href="{{ Auth::user()->role == 'admin' ? url('/admin/dashboard') : url('/hrd/dashboard') }}" class="menu-link">
                <i class="menu-icon ti ti-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        @if(Auth::user()->role == 'admin')
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
                <a href="{{ route('hrd.index') }}" class="menu-link">
                    <i class="menu-icon ti ti-id-badge"></i>
                    <div>Kelola HRD</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('laporan.index') }}" class="menu-link">
                    <i class="menu-icon ti ti-file-text"></i>
                    <div>Laporan Data</div>
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
            <li class="menu-item">
                <a href="{{ route('laporan.index') }}" class="menu-link">
                    <i class="menu-icon ti ti-file-text"></i>
                    <div>Laporan Data</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
