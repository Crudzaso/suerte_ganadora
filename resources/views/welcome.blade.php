<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/style.bundle.css', 'resources/js/app.js'])
</head>
<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-color: #e2bf3283 !important;
            }
            [data-bs-theme="dark"] body {
                background-color: #333;
            }
            .logo {
                align-self: center;
                border-radius: 50%;
                box-shadow: 0 6px 10px 12px rgba(0, 0, 0, 0.5)!important;
                object-fit: cover;
            }
            .login-card{
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19);
                padding: 30px;
                width: 400px;
                max-width: 100%;
                margin: 0 auto;
                text-align: center;
                overflow: hidden;
            }
        </style>
        <div id="card-welcome" class="d-flex flex-column flex-center flex-column-fluid">
            <div class="d-flex flex-column flex-center text-center p-10">
                <div id="kt_login_signin" class="card card-flush w-md-650px py-5">
                    <div id="card-login" class="card-body py-15 py-lg-20">
                        <div id="login-card" class="mb-7">
                            <a href="index.html" class="">
                                <img id="logo-welcome" alt="Logo" src="{{ asset('media/suerte_ganadora_logo_phrase.jpg') }}" class="h-150px logo" />
                            </a>
                        </div>
                        <h1 id="login-title" class="fw-bolder text-gray-900 mb-5">Bienvenidos a suerte ganadora</h1>
                        <div class="fw-semibold fs-6 text-gray-500 mb-7">texto de ejemplo</div>
                        <div class="mb-0">
                            @livewire('login-button')
                            @livewire('register-button')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
