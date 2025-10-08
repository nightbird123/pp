<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel HRD') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Fonts --}}
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700" rel="stylesheet">

    {{-- Core CSS (Vuexy Base) --}}
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/core.css">
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/theme-default.css">
    <link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/css/demo.css">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    {{-- Custom Style --}}
    <style>
        :root {
            --sidebar-width: 250px;
            --light-bg: #f9fafb;
            --dark-bg: #111827;
            --light-card: #ffffff;
            --dark-card: #1f2937;
            --text-light: #111827;
            --text-dark: #f3f4f6;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-light);
            transition: background-color 0.3s, color 0.3s;
        }

        body.dark-mode {
            background-color: var(--dark-bg);
            color: var(--text-dark);
        }

        /* Layout wrapper */
        .layout-wrapper {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar fix */
        #layout-menu {
            width: var(--sidebar-width);
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
        }

        /* Page area */
        .layout-page {
            flex: 1;
            margin-left: var(--sidebar-width);
            display: flex;
            flex-direction: column;
            background-color: var(--light-bg);
            transition: all 0.3s;
            min-height: 100vh;
        }

        body.dark-mode .layout-page {
            background-color: var(--dark-bg);
        }

        /* Navbar */
        .layout-navbar {
            background-color: var(--light-card);
            border-bottom: 1px solid #e5e7eb;
        }

        body.dark-mode .layout-navbar {
            background-color: var(--dark-card);
            border-color: #374151;
        }

        /* Footer */
        footer {
            padding: 1rem;
            text-align: center;
            font-size: 0.9rem;
            color: #6b7280;
            margin-top: auto;
        }

        body.dark-mode footer {
            color: #9ca3af;
        }

        /* Dark mode toggle */
        .dark-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            border-radius: 50%;
            padding: 10px 12px;
            z-index: 2000;
        }

        .dark-toggle i {
            font-size: 1.2rem;
        }

        /* Main content wrapper */
        .content-wrapper {
            padding: 1.5rem;
            flex-grow: 1;
        }

        body.dark-mode .card {
            background-color: var(--dark-card) !important;
            color: var(--text-dark);
        }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        {{-- SIDEBAR --}}
        @include('layoutshrd.sidebar')

        {{-- MAIN PAGE --}}
        <div class="layout-page">

            {{-- NAVBAR --}}
            @include('layoutshrd.navbar')

            {{-- CONTENT --}}
            <main class="content-wrapper">
                @yield('content')
            </main>

            {{-- FOOTER --}}
            <footer>
                © {{ date('Y') }} Laravel HRD — All Rights Reserved
            </footer>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Greeting & clock
        function updateClock() {
            const now = new Date();
            const el = document.getElementById('clock');
            if (el) el.innerText = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
        }

        function updateGreeting() {
            const hour = new Date().getHours();
            let greet = "Selamat Malam 🌙";
            if (hour < 11) greet = "Selamat Pagi ☀️";
            else if (hour < 15) greet = "Selamat Siang 🌤️";
            else if (hour < 18) greet = "Selamat Sore 🌅";
            const g = document.getElementById('greeting');
            if (g) g.innerText = greet;
        }

        setInterval(updateClock, 1000);
        updateClock();
        updateGreeting();

        // Dark Mode Toggle
        document.addEventListener('DOMContentLoaded', () => {
            const body = document.body;
            const toggle = document.createElement('button');
            toggle.className = 'btn btn-secondary dark-toggle shadow';
            toggle.innerHTML = '<i class="bi bi-moon"></i>';
            document.body.appendChild(toggle);

            if (localStorage.getItem('dark-mode') === 'enabled') {
                body.classList.add('dark-mode');
                toggle.innerHTML = '<i class="bi bi-sun"></i>';
            }

            toggle.addEventListener('click', () => {
                const dark = body.classList.toggle('dark-mode');
                localStorage.setItem('dark-mode', dark ? 'enabled' : 'disabled');
                toggle.innerHTML = dark ? '<i class="bi bi-sun"></i>' : '<i class="bi bi-moon"></i>';
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
