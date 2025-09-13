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

    <!-- Vuexy CSS (pakai vendor) -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    .table-responsive {
    overflow: visible !important;
    .dropdown-menu {
    position: absolute !important;
    transform: none !important;
    inset: auto !important;
}

}

/* Tombol glowing */
/* Tombol aksi dengan nuansa elegan */
.btn-gradient {
    background: linear-gradient(135deg, #5a67d8, #434190); /* ungu soft */
    color: #fff;
    border: none;
    transition: all 0.3s ease-in-out;
    border-radius: 8px;
    padding: 6px 12px;
    font-weight: 500;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #434190, #2b2d42);
    box-shadow: 0 4px 12px rgba(67, 65, 144, 0.4); /* soft shadow */
    transform: translateY(-2px); /* sedikit naik */
}

/* Dropdown lebih halus */
.dropdown-menu.animate-dropdown {
    animation: fadeInSoft 0.25s ease forwards;
    border-radius: 10px;
    border: none;
    box-shadow: 0 6px 20px rgba(0,0,0,0.15); /* bayangan soft */
    overflow: hidden;
}
@keyframes fadeInSoft {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Item dropdown lebih estetik */
.dropdown-menu .dropdown-item {
    padding: 10px 16px;
    transition: background 0.2s ease, padding-left 0.2s ease;
}
.dropdown-menu .dropdown-item:hover {
    background: rgba(90,103,216,0.15); /* highlight soft */
    padding-left: 20px; /* sedikit geser kanan */
}

</style>

</head>
<!-- Bootstrap Bundle with Popper (WAJIB buat dropdown, modal, tooltip) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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

    <!-- Vuexy JS (pakai vendor) -->
    <script src="{{ asset('vendor/js/core.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <script src="{{ asset('vendor/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.form-hapus');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // cegah submit langsung

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
                    form.submit(); // submit form kalau user klik "Ya"
                }
            });
        });
    });
});
</script>
@stack('scripts')

</body>
</html>
