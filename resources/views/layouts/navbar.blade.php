<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="ti ti-menu-2 ti-md"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item navbar-search-wrapper mb-0">
        <form action="{{ route('search') }}" method="GET" class="d-flex align-items-center">
          <i class="ti ti-search ti-md me-2 me-lg-4 ti-lg"></i>
          <input type="text" name="q" class="form-control border-0 shadow-none" placeholder="Search (Ctrl+/)" aria-label="Search" value="{{ request('q') }}" />
        </form>
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- Language -->
      <li class="nav-item dropdown-language dropdown">
        <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <i class="ti ti-language rounded-circle ti-md"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="?lang=en">English</a></li>
          <li><a class="dropdown-item" href="?lang=id">Indonesia</a></li>
        </ul>
      </li>

      <!-- Style Switcher -->
      <li class="nav-item dropdown-style-switcher dropdown">
        <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <i class="ti ti-md"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
          <li><a class="dropdown-item" href="javascript:void(0);" data-theme="light"><i class="ti ti-sun ti-md me-2"></i> Light</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);" data-theme="dark"><i class="ti ti-moon-stars ti-md me-2"></i> Dark</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);" data-theme="system"><i class="ti ti-device-desktop-analytics ti-md me-2"></i> System</a></li>
        </ul>
      </li>

      <!-- Notification -->
      <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
        <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <span class="position-relative">
            <i class="ti ti-bell ti-md"></i>
            <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end p-0">
          <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
              <h6 class="mb-0 me-auto">Notification</h6>
              <a href="javascript:void(0)" class="btn btn-text-secondary rounded-pill btn-icon">
                <i class="ti ti-mail-opened text-heading"></i>
              </a>
            </div>
          </li>
          <li>
            <div class="d-grid p-4">
              <a class="btn btn-primary btn-sm d-flex" href="#">View all notifications</a>
            </div>
          </li>
        </ul>
      </li>

      <!-- User -->
      <li class="nav-item dropdown dropdown-user">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="d-flex align-items-center">
            <div class="avatar avatar-online me-2">
              <img src="{{ Auth::user() && Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('vendor/images/avatars/user.png') }}"
                   alt="User Avatar" class="rounded-circle" width="40" height="40" />
            </div>
            <div class="d-none d-xl-block">
              <span class="fw-semibold d-block">{{ Auth::user()->name ?? 'Guest' }}</span>
              <small class="text-muted">Admin</small>
            </div>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="{{ route('profile.edit') }}">
              <i class="ti ti-user me-2"></i> Ubah Profil
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('settings') }}">
              <i class="ti ti-settings me-2"></i> Pengaturan
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item text-danger">
                <i class="ti ti-logout me-2"></i> Logout
              </button>
            </form>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
