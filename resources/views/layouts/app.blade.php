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
        
           .btn-gradient {
        background: linear-gradient(45deg, #17a2b8, #0d6efd); /* gradasi toska → biru */
        color: #fff;
        border: none;
        padding: 5px 12px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: 0.2s ease-in-out;
    }
    .btn-gradient:hover {
        background: linear-gradient(45deg, #138496, #0b5ed7); /* lebih gelap saat hover */
        color: #fff;
    }
    .btn-gradient:focus {
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.4);
    }
        /* ====================== DARK MODE ====================== */
        body.dark-mode {
            background-color: #121212 !important;
            color: #f5f5f5 !important;
        }

        /* Navbar Dark */
        body.dark-mode .navbar,
        body.dark-mode .layout-navbar {
            background-color: #1f1f1f !important;
            color: #f5f5f5 !important;
            border-bottom: 1px solid #333 !important;
        }

        /* Sidebar Dark */
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

        /* Card/Panel Dark */
        body.dark-mode .card,
        body.dark-mode .dropdown-menu {
            background-color: #1e1e1e !important;
            color: #f5f5f5 !important;
            border: 1px solid #333 !important;
        }

        /* Input Dark */
        body.dark-mode input.form-control,
        body.dark-mode select.form-select,
        body.dark-mode textarea.form-control {
            background-color: #2a2a3c !important;
            color: #fff !important;
            border: 1px solid #444 !important;
        }

        /* Divider Dark */
        body.dark-mode .soft-divider {
            background: rgba(255, 255, 255, 0.15) !important;
        }

        /* Layout Page Dark */
        body.dark-mode .layout-page {
            background-color: #18181b !important;
        }

        /* ====================== SIDEBAR DEFAULT ====================== */
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
            top: 2px;
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
        /* Perbaikan navbar dark-mode lebih kuat */
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
/* Chart text agar putih saat dark mode */
body.dark-mode .apexcharts-tooltip,
body.dark-mode .apexcharts-tooltip-text,
body.dark-mode .apexcharts-legend-text,
body.dark-mode .apexcharts-title-text,
body.dark-mode .apexcharts-xaxis-title,
body.dark-mode .apexcharts-yaxis-title,
body.dark-mode .apexcharts-xaxis-label,
body.dark-mode .apexcharts-yaxis-label {
    color: #f5f5f5 !important;
    fill: #f5f5f5 !important; /* untuk SVG text */
}

/* Tooltip background */
body.dark-mode .apexcharts-tooltip {
    background: #1e1e1e !important;
    border: 1px solid #333 !important;
}

/* Kotak Search Lebih Jelas */
/* ===== Search Box Styling ===== */
.search-box {
    position: relative;
    max-width: 600px; /* dari 320px jadi lebih panjang */
    width: 100%;
    margin: 0 auto;   /* biar agak ke tengah */
}

.search-box .search-input {
    border-radius: 8px;
    border: 1px solid #ddd;
    background: #f9f9f9;
    padding-right: 40px; /* ruang buat icon */
    transition: all 0.25s ease;
    font-size: 0.9rem;
}

/* Hover & Focus */
.search-box .search-input:hover {
    background: #fff;
    border-color: #bbb;
}
.search-box .search-input:focus {
    outline: none;
    border-color: #666;
    box-shadow: 0 0 0 2px rgba(100,100,100,0.2);
}

/* Tombol ikon kanan */
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

/* Dark mode */
body.dark-mode .search-box .search-input {
    background: #2c2c2c;
    border: 1px solid rgba(255,255,255,0.2);
    color: #eee;
}
body.dark-mode .search-box .search-btn {
    color: #bbb;
}
body.dark-mode .search-box .search-btn:hover {
    color: #fff;
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

    <!-- Script Konfirmasi Hapus -->
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

            // ================= DARK MODE TOGGLE =================
            const body = document.body;
            const darkModeToggle = document.createElement('button');
            darkModeToggle.innerHTML = '<i class="bi bi-moon"></i>';
            darkModeToggle.className = 'btn btn-sm btn-secondary position-fixed';
            darkModeToggle.style.bottom = '20px';
            darkModeToggle.style.right = '20px';
            darkModeToggle.style.zIndex = '2000';
            document.body.appendChild(darkModeToggle);

            // Cek dari localStorage
            if (localStorage.getItem('dark-mode') === 'enabled') {
                body.classList.add('dark-mode');
                darkModeToggle.innerHTML = '<i class="bi bi-sun"></i>';
            }

            // Klik toggle
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
