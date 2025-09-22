<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme shadow-sm px-3"
    id="layout-navbar">

    <!-- Toggle Sidebar (Mobile) -->
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 d-xl-none">
        <a class="nav-item nav-link px-0" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="d-flex align-items-center justify-content-between flex-grow-1" id="navbar-collapse">

        <!-- Search -->
        <div class="flex-grow-1 d-flex justify-content-center">
            <form action="{{ route('search') }}" method="GET" class="w-100" style="max-width:600px;">
                <div class="search-box">
                    <input type="text" name="q" class="form-control search-input pe-5"
                        placeholder="Search (Ctrl+/)" value="{{ request('q') }}">
                    <button type="submit" class="search-btn">
                        <i class="ti ti-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Divider Soft -->
        <div class="soft-divider d-none d-lg-block"></div>

        <!-- Right Side -->
        <ul class="navbar-nav d-flex align-items-center flex-row gap-3 mb-0">

            <!-- Clock -->
            <li class="nav-item mx-3 d-none d-lg-block d-flex align-items-center">
                <img src="{{ asset('img/icons/clock1') }}" alt="Jam" class="me-2" style="height:45px;">
                <span id="clock" class="fw-semibold text-muted"></span>
            </li>

            <!-- Theme Toggle -->
            <li class="nav-item mx-2">
                <a class="nav-link p-2 rounded-circle bg-light-subtle" href="javascript:void(0)" id="theme-toggle">
                    <img id="theme-icon" src="{{ asset('img/icons/aun.png') }}" alt="Mode" style="height:22px;">
                </a>
            </li>

            <!-- Notification -->
            <li class="nav-item dropdown mx-2">
                <a class="nav-link p-2 rounded-circle bg-light-subtle position-relative" href="#"
                    data-bs-toggle="dropdown">
                    <img src="{{ asset('img/icons/bell.png') }}" alt="Notif" style="height:22px;">

                    @if(session('notifs') && count(session('notifs')) > 0)
                        <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle p-1"
                            style="font-size: 0.65rem;">
                            {{ count(session('notifs')) }}
                        </span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2">
                    <li>
                        <h6 class="dropdown-header d-flex justify-content-between align-items-center">
                            Notifikasi
                            @if(session('notifs') && count(session('notifs')) > 0)
                                <form action="{{ route('notif.reset') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-link text-danger p-0">Reset</button>
                                </form>
                            @endif
                        </h6>
                    </li>
                    @if(session('notifs') && count(session('notifs')) > 0)
                        @foreach(session('notifs') as $notif)
                            <li><span class="dropdown-item">{{ $notif }}</span></li>
                        @endforeach
                    @else
                        <li><span class="dropdown-item text-muted">Tidak ada notifikasi</span></li>
                    @endif
                </ul>
            </li>

            <!-- User Dropdown -->
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <img src="{{ Auth::check() && Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('img/avatars/6.png') }}"
                        alt="User Avatar" class="rounded-circle border me-2" width="40" height="40">
                    <div class="d-none d-lg-flex flex-column text-start">
                        <span class="fw-semibold">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
                        <small class="text-muted">
                            @if (Auth::check())
                                {{ Auth::user()->role === 'admin' ? 'Administrator' : 'HRD' }}
                            @else
                                Pengunjung
                            @endif
                        </small>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end modern-dropdown shadow-lg border-0 rounded-3 mt-2">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                            <i class="ti ti-user me-2 text-primary"></i> Ubah Profil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('settings') }}">
                            <i class="ti ti-settings me-2 text-warning"></i> Pengaturan
                        </a>
                    </li>
                    <li><div class="dropdown-divider"></div></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger d-flex align-items-center">
                                <i class="ti ti-logout me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<style>
    .soft-divider {
        width: 1px;
        height: 28px;
        background: rgba(255, 255, 255, 0.15);
        margin: 0 12px;
        border-radius: 2px;
    }
    body:not(.dark-mode) .soft-divider {
        background: rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    // Clock
    function updateClock() {
        let now = new Date();
        document.getElementById('clock').innerText =
            now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
    }
    setInterval(updateClock, 1000);
    updateClock();

    // Theme Toggle
    document.getElementById('theme-toggle').addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
</script>
