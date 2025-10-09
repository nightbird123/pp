<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center shadow-sm px-3"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 d-xl-none">
        <a class="nav-item nav-link px-0" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="d-flex align-items-center justify-content-between flex-grow-1" id="navbar-collapse">
        <div class="flex-grow-1 d-flex justify-content-center">
            <form action="{{ Route::has('hrd.search') ? route('hrd.search') : '#' }}" method="GET"
                class="w-100" style="max-width:600px;">
                <div class="search-box">
                    <input type="text" name="q" class="form-control search-input pe-5"
                        placeholder="Cari pegawai atau data (Ctrl+/)" value="{{ request('q') }}">
                    <button type="submit" class="search-btn">
                        <i class="ti ti-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="soft-divider d-none d-lg-block"></div>
        <ul class="navbar-nav d-flex align-items-center flex-row gap-3 mb-0">
            <li class="nav-item d-none d-lg-flex align-items-center text-muted fw-semibold">
                <i class="ti ti-sun me-2 text-warning"></i>
                <span id="greeting">Selamat Datang ☀️</span>
            </li>
            <li class="nav-item">
                <a href="{{ Route::has('hrd.pegawai.create') ? route('hrd.pegawai.create') : '#' }}"
                    class="btn btn-sm btn-primary rounded-pill px-3 d-flex align-items-center shadow-sm quick-btn">
                    <i class="ti ti-plus me-1"></i> Tambah
                </a>
            </li>
            <li class="nav-item d-none d-lg-flex align-items-center text-secondary fw-semibold">
                <i class="ti ti-clock me-2"></i>
                <span id="clock">--:--</span>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" id="theme-toggle"
                    class="nav-link p-2 rounded-circle bg-light-subtle shadow-sm">
                    <img id="theme-icon" src="{{ asset('img/icons/lg.png') }}" alt="Mode" style="height:22px;">
                </a>
            </li>
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
                    <li class="dropdown-header px-3 py-2 fw-semibold d-flex justify-content-between">
                        Notifikasi
                        @if (session('notifs') && count(session('notifs')) > 0)
                            <form action="{{ Route::has('hrd.notif.reset') ? route('hrd.notif.reset') : '#' }}"
                                method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-link text-danger p-0">Hapus Semua</button>
                            </form>
                        @endif
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    @if (session('notifs') && count(session('notifs')) > 0)
                        @foreach (session('notifs') as $notif)
                            <li><span class="dropdown-item small text-wrap">{{ $notif }}</span></li>
                        @endforeach
                    @else
                        <li><span class="dropdown-item text-muted small">Tidak ada notifikasi</span></li>
                    @endif
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Auth::check() && Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('img/avatars/6.png') }}"
                        alt="User Avatar" class="rounded-circle border shadow-sm" width="40" height="40">
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 mt-2 overflow-hidden">
                    <li class="dropdown-user-header px-3 py-3 bg-light-subtle">
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
<style>
    .soft-divider {
        width: 1px;
        height: 28px;
        background: rgba(0, 0, 0, 0.1);
        margin: 0 12px;
        border-radius: 2px;
    }
    body.dark-mode .soft-divider {
        background: rgba(255, 255, 255, 0.15);
    }
    .search-box { position: relative; }
    .search-input {
        border-radius: 2rem;
        padding-left: 1rem;
        padding-right: 2.5rem;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    }
    .search-btn {
        position: absolute; right: 0.75rem; top: 50%;
        transform: translateY(-50%);
        border: none; background: transparent; color: #888;
    }
    .search-btn:hover { color: #333; }
    .nav-link { transition: all 0.3s ease; }
    .nav-link:hover { background: rgba(0,0,0,0.05); transform: scale(1.1); }
    body.dark-mode .nav-link:hover { background: rgba(255,255,255,0.1); }
    .quick-btn:hover { transform: scale(1.05); }
    body { transition: background 0.4s ease, color 0.4s ease; }
</style>
<script>
    function updateClock() {
        let now = new Date();
        document.getElementById('clock').innerText =
            now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
    }
    setInterval(updateClock, 1000); updateClock();

    function updateGreeting() {
        let hour = new Date().getHours();
        let greeting = (hour < 11) ? "Selamat Pagi ☀️" :
                       (hour < 15) ? "Selamat Siang 🌤️" :
                       (hour < 18) ? "Selamat Sore 🌅" : "Selamat Malam 🌙";
        document.getElementById("greeting").innerText = greeting;
    }
    updateGreeting(); setInterval(updateGreeting, 60000);
    document.getElementById('theme-toggle').addEventListener('click', function() {
        let body = document.body;
        body.classList.toggle('dark-mode');
        let isDark = body.classList.contains("dark-mode");
        localStorage.setItem('dark-mode', isDark ? 'enabled' : 'disabled');
        let themeIcon = document.getElementById("theme-icon");
        themeIcon.src = isDark ? "{{ asset('img/icons/moon.png') }}" : "{{ asset('img/icons/lg.png') }}";
    });
    document.addEventListener("DOMContentLoaded", () => {
        if (localStorage.getItem('dark-mode') === 'enabled') {
            document.body.classList.add("dark-mode");
            document.getElementById("theme-icon").src = "{{ asset('img/icons/moon.png') }}";
        }
    });
</script>
