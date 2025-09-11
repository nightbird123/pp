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
</body>
</html>
