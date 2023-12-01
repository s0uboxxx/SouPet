<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo-icon.avif') }}" type="image/png" width="40" height="40">
    <meta author="Bùi Nguyễn Quang Duy - s0ubox">
    <meta description="SouPet - Cửa hàng cho thú cưng">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title') / {{ config('app.name') }}
    </title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('build/assets/app-d3d4c8c4.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-2eeea12c.css') }}">

    <script type="module" src="{{ asset('build/assets/app-4e2c3536.js') }}" defer></script>

    @yield('styles')
    @yield('head_scripts')
</head>

<body>
    <div id="app">
        @include('layouts.header')
        @include('auth.confirm')

        <main class="mb-5 mt-32">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            
            @yield('content')
        </main>
        @yield('modal')
    </div>
    <footer class="px-4 footer">
        <div class="text-center lh-2-5 gray-light text-fs-13 text-fst-italic">© 2023 SouPet by
            <a href="https://github.com/s0uboxxx" class="blue">s0ubox</a>
        </div>
    </footer>

    @yield('body_scripts')
    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alertElement = document.querySelector('.alert');

                if (alertElement) {
                    alertElement.classList.add('hidden');
                }
            }, 3500);
        });
    </script>
    <script src="{{ asset('js/script-ps.js') }}" defer></script>
    <script src="{{ asset('js/script-cf.js') }}" defer></script>
</body>

</html>
