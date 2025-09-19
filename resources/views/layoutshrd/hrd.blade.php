<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HRD - {{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/core.css">
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/theme-default.css">
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/demo.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .layout-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #2563eb, #1e3a8a);
            color: #f9fafb;
        }
        .layout-menu h4 { color: #fff; }
        .layout-menu .menu-link {
            display: block;
            padding: 10px 16px;
            color: #e0e7ff;
            border-radius: 8px;
            transition: .3s;
        }
        .layout-menu .menu-link:hover {
            background: rgba(255,255,255,.15);
            color: #fff;
        }
        .layout-menu .active {
            background: rgba(255,255,255,.25);
            font-weight: 600;
        }
        .layout-page { margin-left: 260px; background: #f3f4f6; min-height: 100vh; }
        .layout-navbar { background: #f9fafb; border-bottom: 1px solid #ddd; padding: 10px 20px; }
        .content-wrapper { padding: 20px; }
    </style>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            {{-- Sidebar khusus HRD --}}
            <aside class="layout-menu">
                <h4 class="p-3">Dinas Pegawai</h4>
                <a href="{{ route('hrd.dashboard') }}" class="menu-link {{ request()->routeIs('hrd.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a href="{{ route('hrd.pegawai.index') }}" class="menu-link {{ request()->routeIs('hrd.pegawai.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> Kelola Pegawai
                </a>
                <a href="{{ route('hrd.laporan.pegawai') }}" class="menu-link {{ request()->routeIs('hrd.laporan.pegawai') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i> Laporan Pegawai
                </a>
                <a href="{{ route('hrd.laporan.absensi') }}" class="menu-link {{ request()->routeIs('hrd.laporan.absensi') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check"></i> Laporan Absensi
                </a>
                <a href="{{ route('hrd.laporan.cuti') }}" class="menu-link {{ request()->routeIs('hrd.laporan.cuti') ? 'active' : '' }}">
                    <i class="bi bi-calendar-x"></i> Laporan Cuti
                </a>
            </aside>

            <div class="layout-page">
                {{-- Navbar HRD --}}
                <nav class="layout-navbar d-flex justify-content-between">
                    <span>👔 HRD Panel</span>
                    <div>
                        <span>{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-outline-danger ms-2">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </nav>

                <div class="content-wrapper">
                    <div class="container-xxl">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
