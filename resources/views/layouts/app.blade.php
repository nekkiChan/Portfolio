<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'None') }}</title>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis/css?family=Nunito">

    {{-- Styles --}}
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="header bg-white shadow-sm d-flex">
            {{-- タイトル --}}
            <div class="site-title w-75 h-100 d-flex align-items-center justify-content-start ms-3">
                <a href="{{ url('/') }}" class="text-dark text-decoration-none">
                    {{-- <div class="site-title justify-content-start text-dark"> --}}
                    {{ config('app_name', 'NekkiChan Site demo') }}
                    {{-- </div> --}}
                </a>{{-- ./title --}}
            </div>

            {{-- SNSのリンク --}}
            <div class="w-25 h-100 d-flex align-items-center justify-content-end">
                <div class="sns-link h-50 me-3">
                    <a href="{{ config('sns-link', 'https://www.instagram.com/tama.goyakiclub') }}">
                        <img src="{{ asset('storage/instagram.png') }}" alt="instagram" class="h-100">
                    </a>
                </div>
                <div class="sns-link h-50 me-3">
                    <a href="{{ config('sns-link', 'https://github.com/nekkiChan') }}">
                        <img src="{{ asset('storage/github.png') }}" alt="github" class="h-100">
                    </a>
                </div>
                <div class="sns-link h-50 me-3">
                    <a href="{{ config('sns-link', 'https://twitter.com/tama5yakiClub') }}">
                        <img src="{{ asset('storage/twitter.png') }}" alt="twitter" class="h-100">
                    </a>
                </div>
            </div>{{-- ./sns-link --}}
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- </div#app> --}}
</body>

</html>
