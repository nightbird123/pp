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
        <div class="flex-grow-1 me-3">
            <form action="{{ route('search') }}" method="GET" class="d-flex align-items-center w-100">
                <i class="ti ti-search ti-md me-2 text-muted"></i>
                <input type="text" name="q" class="form-control border-0 shadow-none"
                    placeholder="Search (Ctrl+/)" aria-label="Search" value="{{ request('q') }}" />
            </form>
        </div>

        <!-- Right Side (Clock, Theme, Notif, User) -->
        <ul class="navbar-nav d-flex align-items-center flex-row gap-3 mb-0">


            <!-- Clock -->
            <li class="nav-item mx-3 d-none d-lg-block d-flex align-items-center">
                <img src="{{ asset('img/icons/clock.png') }}" alt="Jam" class="me-2" style="height:22px;">
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
                    <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle p-1"
                        style="font-size: 0.65rem;">3</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2">
                    <li>
                        <h6 class="dropdown-header">Notifikasi</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Pegawai baru ditambahkan</a></li>
                    <li><a class="dropdown-item" href="#">Pengajuan cuti menunggu persetujuan</a></li>
                    <li><a class="dropdown-item" href="#">Profil berhasil diperbarui</a></li>
                </ul>
            </li>

            <!-- User Dropdown -->
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="javascript:void(0);"
                    data-bs-toggle="dropdown">

                    <!-- Avatar Bulat -->
                    <img src="{{ Auth::check() && Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('img/avatars/6.png') }}"
                        alt="User Avatar" class="rounded-circle border me-2" width="40" height="40">

                    <!-- Nama + Role -->
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

                <!-- Dropdown Menu -->
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
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
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
<script>
    // Clock
    function updateClock() {
        let now = new Date();
        document.getElementById('clock').innerText =
            now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });
    }
    setInterval(updateClock, 1000);
    updateClock();

    // Theme Toggle
    document.getElementById('theme-toggle').addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        let icon = document.getElementById('theme-icon');
        icon.classList.toggle('ti-sun');
        icon.classList.toggle('ti-moon');
    });
</script>
