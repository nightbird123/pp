<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        /* Dark Mode */
.dark-mode {
    background-color: #1e1e2f !important;
    color: #e0e0e0 !important;
}

.dark-mode .navbar,
.dark-mode .layout-navbar {
    background-color: #2c2c3e !important;
    color: #f5f5f5 !important;
}

.dark-mode .sidebar,
.dark-mode .layout-menu {
    background-color: #252538 !important;
    color: #ccc !important;
}

.dark-mode .card {
    background-color: #2e2e44 !important;
    color: #e0e0e0 !important;
}

.dark-mode .dropdown-menu {
    background-color: #2c2c3e !important;
    color: #f0f0f0 !important;
}

.dark-mode .form-control {
    background-color: #2e2e44 !important;
    color: #fff !important;
    border: 1px solid #444 !important;
}

.dark-mode .form-control::placeholder {
    color: #aaa !important;
}

.dark-mode .badge.bg-danger {
    background-color: #e74c3c !important;
}

        .layout-menu {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 260px !important;
            height: 100vh !important;
            overflow-y: auto !important;
            background: linear-gradient(180deg, #2563eb, #1e3a8a);
            /* biru gradasi */
            color: #f9fafb !important;
            z-index: 1030;
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.1);
            /* bayangan halus */
        }

        /* Judul Sidebar */
        .layout-menu h4,
        .layout-menu .menu-header {
            color: #ffffff !important;
            font-weight: 600;
            letter-spacing: .5px;
        }

        /* Link Sidebar */
        .layout-menu .menu-link {
            color: #e0e7ff !important;
            /* biru muda */
            padding: 10px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .layout-menu .menu-link:hover {
            background-color: rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            transform: translateX(5px);
            /* efek geser */
        }

        /* Link Aktif */
        .layout-menu .menu-item.active>.menu-link {
            background-color: rgba(255, 255, 255, 0.25) !important;
            color: #fff !important;
            font-weight: 600;
            box-shadow: inset 2px 0 0 #3b82f6;
            /* garis kiri */
        }

        /* Layout Page */
        .layout-page {
            margin-left: 260px !important;
            background-color: #f3f4f6 !important;
            min-height: 100vh;
        }

        /* Navbar */
        .layout-navbar {
            position: sticky;
            top: 0;
            z-index: 1040;
            background-color: #f9fafb !important;
            color: #111827 !important;
            border-bottom: 1px solid #d1d5db;
        }

        /* Konten */
        .content-wrapper {
            padding: 20px;
        }

        /* Efek animasi dropdown */

        .dropdown-menu {
            transition: all 0.3s ease;
        }

        .dropdown-menu.show {
            transform: translateY(10px);
        }

        /* Card Dashboard Gradient */
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

        /* Warna per card */
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
        .dark-mode {
    background-color: #121212;
    color: #f5f5f5;
}
.dark-mode .card {
    background-color: #1e1e1e;
    color: #f5f5f5;
}

    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            {{-- Sidebar --}}
            @include('layouts.sidebar')

            <div class="layout-page">
                {{-- Navbar --}}
                @include('layouts.navbar')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                        @yield('scripts')
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap + Vuexy JS via CDN -->
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
        });
    </script>

    @stack('scripts')
</body>

</html>
