<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center shadow-sm px-3"
    id="layout-navbar">

    {{-- Toggle Sidebar (Mobile) --}}
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 d-xl-none">
        <a class="nav-item nav-link px-0" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="d-flex align-items-center justify-content-between flex-grow-1" id="navbar-collapse">

        {{-- SEARCH --}}
        <div class="flex-grow-1 d-flex justify-content-center">
            <form action="{{ Route::has('hrd.search') ? route('hrd.search') : '#' }}" method="GET"
                class="w-100" style="max-width:600px;">
                <div class="position-relative">
                    <input type="text" name="q" class="form-control ps-4 pe-5 rounded-pill border-0 shadow-sm"
                        placeholder="Cari pegawai atau data (Ctrl+/)" value="{{ request('q') }}">
                    <button type="submit"
                        class="btn position-absolute top-50 end-0 translate-middle-y me-2 text-muted">
                        <i class="ti ti-search"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- NAV RIGHT --}}
        <ul class="navbar-nav d-flex align-items-center flex-row gap-3 mb-0 ms-auto">

            {{-- SAPAAN --}}
            <li class="nav-item d-none d-lg-flex align-items-center text-muted fw-semibold">
                <i class="ti ti-sun me-2 text-warning"></i>
                <span id="greeting">Selamat Datang ☀️</span>
            </li>

            {{-- TOMBOL TAMBAH --}}
            <li class="nav-item">
                <a href="{{ Route::has('hrd.pegawai.create') ? route('hrd.pegawai.create') : '#' }}"
                    class="btn btn-sm btn-primary rounded-pill px-3 d-flex align-items-center shadow-sm">
                    <i class="ti ti-plus me-1"></i> Tambah
                </a>
            </li>

            {{-- JAM --}}
            <li class="nav-item d-none d-lg-flex align-items-center text-secondary fw-semibold">
                <i class="ti ti-clock me-2"></i>
                <span id="clock">--:--</span>
            </li>

            {{-- THEME TOGGLE --}}
            <li class="nav-item">
                <a href="javascript:void(0)" id="theme-toggle"
                    class="nav-link p-2 rounded-circle bg-light-subtle shadow-sm">
                    <i id="theme-icon" class="bi bi-moon text-secondary"></i>
                </a>
            </li>

            {{-- NOTIFIKASI --}}
            <li class="nav-item dropdown">
                <a class="nav-link p-2 rounded-circle bg-light-subtle position-relative" href="#"
                    data-bs-toggle="dropdown">
                    <i class="ti ti-bell text-secondary"></i>
                    @if (session('notifs') && count(session('notifs')) > 0)
                        <span
                            class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle p-1"
                            style="font-size: 0.65rem;">
                            {{ count(session('notifs')) }}
                        </span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2 overflow-hidden">
                    <li class="dropdown-header px-3 py-2 fw-semibold">
                        Notifikasi
                        @if (session('notifs') && count(session('notifs')) > 0)
                            <form action="{{ Route::has('hrd.notif.reset') ? route('hrd.notif.reset') : '#' }}"
                                method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-link text-danger p-0 float-end">
                                    Hapus Semua
                                </button>
                            </form>
                        @endif
                    </li>
                    <li>
                        <hr class="dropdown-divider my-1">
                    </li>
                    @if (session('notifs') && count(session('notifs')) > 0)
                        @foreach (session('notifs') as $notif)
                            <li><span class="dropdown-item small text-wrap">{{ $notif }}</span></li>
                        @endforeach
                    @else
                        <li><span class="dropdown-item text-muted small">Tidak ada notifikasi</span></li>
                    @endif
                </ul>
            </li>

            {{-- USER MENU --}}
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Auth::check() && Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('img/avatars/6.png') }}"
                        alt="User Avatar" class="rounded-circle border shadow-sm" width="40" height="40">
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 mt-2 overflow-hidden">
                    <li class="dropdown-user-header px-3 py-3 bg-light-subtle dark:bg-dark">
                        <div class="d-flex align-items-center">
                            <img src="{{ Auth::check() && Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('img/avatars/6.png') }}"
                                alt="User Avatar" class="rounded-circle me-3 border" width="45" height="45">
                            <div class="d-flex flex-column">
                                <span class="fw-semibold">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
                                <small class="text-muted">HRD</small>
                            </div>
                        </div>
                    </li>

                    <li><hr class="dropdown-divider my-0"></li>

                    <li>
                        <a class="dropdown-item py-2 d-flex align-items-center"
                            href="{{ Route::has('hrd.profile.edit') ? route('hrd.profile.edit') : '#' }}">
                            <i class="ti ti-user me-2 text-primary"></i> Profil Saya
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2 d-flex align-items-center"
                            href="{{ Route::has('hrd.settings') ? route('hrd.settings') : '#' }}">
                            <i class="ti ti-settings me-2 text-warning"></i> Pengaturan
                        </a>
                    </li>

                    <li><hr class="dropdown-divider my-0"></li>

                    <li class="p-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                                <i class="ti ti-logout me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

{{-- === SCRIPT === --}}
<script>
    // Dark mode sync
    document.addEventListener('DOMContentLoaded', () => {
        const body = document.body;
        const themeToggle = document.getElementById('theme-toggle');
        const icon = document.getElementById('theme-icon');

        if (localStorage.getItem('dark-mode') === 'enabled') {
            body.classList.add('dark-mode');
            icon.className = 'bi bi-sun text-warning';
        }

        themeToggle.addEventListener('click', () => {
            const enabled = body.classList.toggle('dark-mode');
            localStorage.setItem('dark-mode', enabled ? 'enabled' : 'disabled');
            icon.className = enabled ? 'bi bi-sun text-warning' : 'bi bi-moon text-secondary';
        });
    });
</script>
