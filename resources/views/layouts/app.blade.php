<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Vuexy CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* =====================
           LAYOUT & SIDEBAR
        ====================== */
        .layout-menu {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 260px !important; 
            height: 100vh !important; 
            overflow-y: auto !important;
            background-color: #1f2937 !important; /* abu tua */
            color: #f9fafb !important;
            z-index: 1030;
        }

        .layout-page {
            margin-left: 260px !important; /* geser konten biar ga ketiban */
            background-color: #f3f4f6 !important; /* abu soft */
            min-height: 100vh;
        }

        /* =====================
           NAVBAR
        ====================== */
        .layout-navbar,
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1040;
            background-color: #e5e7eb !important; /* abu terang */
            color: #111827 !important;
            border-bottom: 1px solid #d1d5db;
        }

        /* =====================
           SIDEBAR MENU LINK
        ====================== */
        .layout-menu .menu-link {
            color: #d1d5db !important;
            padding: 10px 16px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        .layout-menu .menu-link:hover {
            background-color: #374151 !important;
            color: #ffffff !important;
        }

        /* =====================
           KONTEN UTAMA
        ====================== */
        .content-wrapper {
            padding: 20px;
        }
        body,
        .layout-wrapper {
            background-color: #f3f4f6 !important;
            color: #111827 !important;
        }

        /* =====================
           CARD & TABLE
        ====================== */
        .card,
        .table {
            background-color: #ffffff !important;
            color: #111827 !important;
            border: 1px solid #e5e7eb !important;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        /* =====================
           TOMBOL
        ====================== */
        .btn-primary {
            background-color: #3b82f6 !important;
            border: none !important;
            border-radius: 8px;
            font-weight: 500;
            padding: 6px 14px;
            transition: all 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #2563eb !important;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(37,99,235,0.3);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #5a67d8, #434190);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 6px 14px;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #434190, #2b2d42);
            box-shadow: 0 4px 12px rgba(67,65,144,0.4);
            transform: translateY(-2px);
        }

        /* =====================
           DROPDOWN
        ====================== */
        .dropdown-menu.animate-dropdown {
            animation: fadeInSoft 0.25s ease forwards;
            border-radius: 10px;
            border: none;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            overflow: hidden;
        }
        @keyframes fadeInSoft {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .dropdown-menu .dropdown-item {
            padding: 10px 16px;
            transition: background 0.2s ease, padding-left 0.2s ease;
        }
        .dropdown-menu .dropdown-item:hover {
            background: rgba(90,103,216,0.15);
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            {{-- Sidebar --}}
            @include('layouts.sidebar')

            <!-- Layout page -->
            <div class="layout-page">

                {{-- Navbar --}}
                @include('layouts.navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>

                    {{-- Footer --}}
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vuexy JS -->
    <script src="{{ asset('vendor/js/core.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <script src="{{ asset('vendor/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.form-hapus');

        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
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
    });
    </script>

    @stack('scripts')
</body>
</html>
