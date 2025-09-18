<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">

    <!-- Toggle Sidebar (Mobile) -->
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center flex-grow-1" id="navbar-collapse">

        <!-- Search -->
        <div class="navbar-nav align-items-center flex-grow-1">
            <div class="nav-item navbar-search-wrapper mb-0 w-100">
                <form action="{{ route('search') }}" method="GET" class="d-flex align-items-center w-100">
                    <i class="ti ti-search ti-md me-2"></i>
                    <input type="text" name="q" class="form-control border-0 shadow-none"
                        placeholder="Search (Ctrl+/)" aria-label="Search" value="{{ request('q') }}" />
                </form>
            </div>
        </div>
        <!-- /Search -->

        <!-- User Dropdown -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="javascript:void(0);"
                    data-bs-toggle="dropdown">

                    <!-- Avatar Bulat -->
                    <!-- Avatar Bulat -->
                    <img src="{{ Auth::check() && Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('img/avatars/6.png') }}"
                        alt="User Avatar" class="rounded-circle border me-2" width="40" height="40">


                    <!-- Nama + Role -->
                    <div class="d-flex flex-column text-start">
                        <span class="fw-semibold">
                            {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                        </span>
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
                <ul class="dropdown-menu dropdown-menu-end modern-dropdown shadow-lg border-0 rounded-3">
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
        <!-- /User Dropdown -->

    </div>
</nav>

