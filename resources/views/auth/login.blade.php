<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>Login | Pegawai Dinas</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/fontawesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/tabler-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/flag-icons.css') }}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/core.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/theme-default.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/libs/node-waves/node-waves.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/libs/typeahead-js/typeahead.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/libs/@form-validation/form-validation.css') }}"/>

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/css/pages/page-auth.css') }}"/>

    <!-- Helpers -->
    <script src="{{ asset('/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('/js/config.js') }}"></script>
</head>
<body>
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
            <!-- Login Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-6">
                        <a href="{{ url('/') }}" class="app-brand-link">
                            <span class="app-brand-text demo text-heading fw-bold">Data Pegawai Dinas</span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <h4 class="mb-1">Welcome! 👋</h4>
                    <p class="mb-6">Please sign-in to your account</p>

                    <!-- FORM LOGIN -->
                    <form id="formAuthentication" class="mb-4" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="email" class="form-label">Email or Username</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   placeholder="Enter your email or username" required autofocus/>
                        </div>

                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                       placeholder="********" required/>
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>

                        <div class="my-8">
                            <div class="d-flex justify-content-between">
                                <div class="form-check mb-0 ms-2">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember"/>
                                    <label class="form-check-label" for="remember"> Remember Me </label>
                                </div>
                                <a href="{{ route('password.request') }}">
                                    <p class="mb-0">Forgot Password?</p>
                                </a>
                            </div>
                        </div>

                        <div class="mb-6">
                            <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="{{ route('register') }}"><span>Create an account</span></a>
                    </p>


                   
                </div>
            </div>
            <!-- /Login Card -->
        </div>
    </div>
</div>

<!-- Core JS -->
<script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('/vendor/js/menu.js') }}"></script>

<!-- Vendors JS -->
<script src="{{ asset('/vendor/libs/@form-validation/popular.js') }}"></script>
<script src="{{ asset('/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
<script src="{{ asset('/vendor/libs/@form-validation/auto-focus.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/pages-auth.js') }}"></script>
</body>
</html>
