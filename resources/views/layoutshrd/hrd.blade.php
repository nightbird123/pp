<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> HRD {{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Vuexy / Core CSS via CDN -->
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/core.css">
    <link rel="stylesheet"
        href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/theme-default.css">
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/demo.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Tabler Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

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

        #sidebar .menu-section {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 600;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        body.dark-mode #sidebar .menu-section {
            color: rgba(200, 200, 200, 0.7) !important;
        }

        .dropdown-user-header {
            background-color: #f8f9fa;
            color: #212529;
        }

        .dropdown-user-header small {
            color: #6c757d;
        }
        body.dark-mode .dropdown-user-header {
            background-color: #2b2b2b;
            color: #f8f9fa;
        }

        body.dark-mode .dropdown-user-header small {
            color: rgba(255, 255, 255, 0.65);
        }
        .dropdown-menu {
            background-color: #fff;
            color: #212529;
        }
        body.dark-mode .dropdown-menu {
            background-color: #1e1e1e;
            color: #f8f9fa;
        }

        body.dark-mode .dropdown-menu .dropdown-item {
            color: #f8f9fa;
        }

        body.dark-mode .dropdown-menu .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .card-dashboard {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            min-height: 200px;
            height: 100%;
            color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-dashboard::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3));
            z-index: 1;
            transition: background 0.3s ease;
        }

        .card-dashboard .card-body {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            text-align: center;
        }

        .card-dashboard .card-body i,
        .card-dashboard .card-body h6,
        .card-dashboard .card-body h2 {
            color: #fff;
        }

        .card-dashboard:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-dashboard:hover::before {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.4));
        }

        .btn-gradient {
            background: linear-gradient(45deg, #17a2b8, #0d6efd);
            color: #fff;
            border: none;
            padding: 5px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: 0.2s ease-in-out;
        }

        .btn-gradient:hover {
            background: linear-gradient(45deg, #138496, #0b5ed7);
            color: #fff;
        }

        .btn-gradient:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .4);
        }

        body.dark-mode {
            background-color: #121212 !important;
            color: #f5f5f5 !important;
        }

        body.dark-mode .navbar,
        body.dark-mode .layout-navbar {
            background-color: #1f1f1f !important;
            color: #f5f5f5 !important;
            border-bottom: 1px solid #333 !important;
        }

        body.dark-mode .layout-menu {
            background: linear-gradient(180deg, #1f2937, #111827) !important;
            color: #f5f5f5 !important;
        }

        body.dark-mode .layout-menu .menu-link {
            color: #d1d5db !important;
        }

        body.dark-mode .layout-menu .menu-link:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
            color: #fff !important;
        }

        body.dark-mode .layout-menu .menu-item.active>.menu-link {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: #fff !important;
            box-shadow: inset 2px 0 0 #3b82f6;
        }

        body.dark-mode .card,
        body.dark-mode .dropdown-menu {
            background-color: #1e1e1e !important;
            color: #f5f5f5 !important;
            border: 1px solid #333 !important;
        }

        body.dark-mode input.form-control,
        body.dark-mode select.form-select,
        body.dark-mode textarea.form-control {
            background-color: #2a2a3c !important;
            color: #fff !important;
            border: 1px solid #444 !important;
        }

        body.dark-mode .soft-divider {
            background: rgba(255, 255, 255, 0.15) !important;
        }

        body.dark-mode .layout-page {
            background-color: #18181b !important;
        }

        .layout-menu {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 260px !important;
            height: 100vh !important;
            overflow-y: auto !important;
            background: linear-gradient(180deg, #2563eb, #1e3a8a);
            color: #f9fafb !important;
            z-index: 1030;
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.1);
        }

        .layout-menu h4,
        .layout-menu .menu-header {
            color: #ffffff !important;
            font-weight: 600;
            letter-spacing: .5px;
        }

        .layout-menu .menu-link {
            color: #e0e7ff !important;
            padding: 10px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .layout-menu .menu-link:hover {
            background-color: rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            transform: translateX(5px);
        }

        .layout-menu .menu-item.active>.menu-link {
            background-color: rgba(255, 255, 255, 0.25) !important;
            color: #fff !important;
            font-weight: 600;
            box-shadow: inset 2px 0 0 #3b82f6;
        }

        .layout-page {
            margin-left: 260px !important;
            background-color: #f3f4f6 !important;
            min-height: 100vh;
        }

        .layout-navbar {
            position: sticky;
            top: 0;
            z-index: 1040;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            color: #111827 !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        body.dark-mode .layout-navbar {
            background: #2d2d2d !important;
            color: #ffffff !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .content-wrapper {
            padding: 20px;
        }

        .dropdown-menu {
            transition: all 0.3s ease;
        }

        .dropdown-menu.show {
            transform: translateY(10px);
        }

        .dashboard-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            color: white !important;
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .card-pegawai {
            background: linear-gradient(135deg, #6366f1, #3b82f6) !important;
        }

        .card-departemen {
            background: linear-gradient(135deg, #10b981, #059669) !important;
        }

        .card-hrd {
            background: linear-gradient(135deg, #06b6d4, #0284c7) !important;
        }

        .card-hadir {
            background: linear-gradient(135deg, #f59e0b, #d97706) !important;
        }

        .card-cuti {
            background: #6b7280 !important;
            color: #fff;
        }

        body.dark-mode .layout-navbar,
        body.dark-mode .layout-navbar.navbar,
        body.dark-mode .layout-navbar.navbar.navbar-expand-xl,
        body.dark-mode .layout-navbar.navbar.navbar-expand-lg,
        body.dark-mode .layout-navbar.navbar.navbar-expand-md,
        body.dark-mode .layout-navbar.navbar.navbar-expand-sm {
            background-color: #1f1f1f !important;
            color: #f5f5f5 !important;
            border-bottom: 1px solid #333 !important;
        }

        body.dark-mode .layout-navbar * {
            color: #f5f5f5 !important;
        }

        body.dark-mode .apexcharts-tooltip,
        body.dark-mode .apexcharts-tooltip-text,
        body.dark-mode .apexcharts-legend-text,
        body.dark-mode .apexcharts-title-text,
        body.dark-mode .apexcharts-xaxis-title,
        body.dark-mode .apexcharts-yaxis-title,
        body.dark-mode .apexcharts-xaxis-label,
        body.dark-mode .apexcharts-yaxis-label {
            color: #f5f5f5 !important;
            fill: #f5f5f5 !important;
        }

        body.dark-mode .apexcharts-tooltip {
            background: #1e1e1e !important;
            border: 1px solid #333 !important;
        }

        .search-box {
            position: relative;
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
        }

        .search-box .search-input {
            border-radius: 8px;
            border: 1px solid #ddd;
            background: #f9f9f9;
            padding-right: 40px;
            transition: all 0.25s ease;
            font-size: 0.9rem;
        }

        .search-box .search-input:hover {
            background: #fff;
            border-color: #bbb;
        }

        .search-box .search-input:focus {
            outline: none;
            border-color: #666;
            box-shadow: 0 0 0 2px rgba(100, 100, 100, 0.2);
        }

        .search-box .search-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #666;
            font-size: 18px;
            cursor: pointer;
            padding: 0;
            line-height: 1;
        }

        .search-box .search-btn:hover {
            color: #000;
        }

        body.dark-mode .search-box .search-input {
            background: #2c2c2c;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #eee;
        }

        body.dark-mode .search-box .search-btn {
            color: #bbb;
        }

        body.dark-mode .search-box .search-btn:hover {
            color: #fff;
        }

        body.dark-mode table,
        body.dark-mode .table {
            background-color: transparent !important;
            color: #f1f1f1 !important;
            border-color: rgba(255, 255, 255, 0.15) !important;
        }

        body.dark-mode .table thead th {
            color: #e5e5e5 !important;
            border-color: rgba(255, 255, 255, 0.2) !important;
        }

        body.dark-mode .table tbody td {
            color: #ddd !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        body.dark-mode .list-group-item {
            background-color: #1e1e1e !important;
            color: #f1f1f1 !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        body.dark-mode .card .card-header,
        body.dark-mode .card h5,
        body.dark-mode .card h6,
        body.dark-mode .card-title,
        body.dark-mode .card-header h5,
        body.dark-mode .card-header h6 {
            color: #f5f5f5 !important;
        }

        body.dark-mode .apexcharts-title-text {
            fill: #f5f5f5 !important;
            color: #f5f5f5 !important;
        }

        body.light-mode {
            --bg-color: #f9f9f9;
            --box-color: #ffffff;
            --text-color: #000000;
            --text-muted: #666666;
        }

        body.dark-mode {
            --bg-color: #121212;
            --box-color: #1e1e2d;
            --text-color: #e5e5e5;
            --text-muted: #aaaaaa;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .card,
        .box,
        .table {
            background-color: var(--box-color);
            color: var(--text-color);
        }

        .table th,
        .table td {
            color: var(--text-color);
        }

        .text-muted {
            color: var(--text-muted) !important;
        }
        .welcome-card {
            background: linear-gradient(135deg, #ffffff, #f9f9ff);
            transition: all 0.3s ease;
            animation: fadeIn 0.6s ease;
        }

        .welcome-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .welcome-card h4,
        .welcome-card p {
            color: #111827;
        }
        body.dark-mode .welcome-card {
            background: linear-gradient(135deg, #1e1e2d, #2a2a3c);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.6);
        }

        body.dark-mode .welcome-card h4,
        body.dark-mode .welcome-card p {
            color: #f5f5f5 !important;
        }

        body.dark-mode .icon-wrapper {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(59, 130, 246, 0.35));
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }

        body.dark-mode .icon-wrapper i {
            color: #60a5fa;
        }

        .welcome-card h4 {
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        body.dark-mode .card .card-header {
            background-color: #2a2a3c !important;
            color: #f5f5f5 !important;
            border-bottom: 1px solid #444 !important;
        }
        body.dark-mode .list-group-item {
            background-color: #1e1e1e !important;
            color: #f1f1f1 !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }
        body.dark-mode .list-group-item.text-muted {
            color: #aaa !important;
        }
    </style>

</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('layoutshrd.sidebar')

            <div class="layout-page">

                @include('layoutshrd.navbar')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                        @yield('scripts')
                    </div>
                    @include('layoutshrd.footer')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/js/core.js"></script>
    <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/js/menu.js"></script>
    <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.form-hapus');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            const body = document.body;
            const darkModeToggle = document.createElement('button');
            darkModeToggle.innerHTML = '<i class="bi bi-moon"></i>';
            darkModeToggle.className = 'btn btn-sm btn-secondary position-fixed';
            darkModeToggle.style.bottom = '20px';
            darkModeToggle.style.right = '20px';
            darkModeToggle.style.zIndex = '2000';
            document.body.appendChild(darkModeToggle);
            if (localStorage.getItem('dark-mode') === 'enabled') {
                body.classList.add('dark-mode');
                darkModeToggle.innerHTML = '<i class="bi bi-sun"></i>';
            }

            darkModeToggle.addEventListener('click', () => {
                body.classList.toggle('dark-mode');
                if (body.classList.contains('dark-mode')) {
                    localStorage.setItem('dark-mode', 'enabled');
                    darkModeToggle.innerHTML = '<i class="bi bi-sun"></i>';
                } else {
                    localStorage.setItem('dark-mode', 'disabled');
                    darkModeToggle.innerHTML = '<i class="bi bi-moon"></i>';
                }
            });
        });
    </script>

    @stack('scripts')
</body>


</html>
