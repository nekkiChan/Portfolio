<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'None') }}</title>

    {{-- Scripts --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis/css?family=Nunito">

    {{-- Styles --}}
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div id="app">
        {{-- ヘッダー --}}
        <div class="header bg-white shadow-sm d-flex">
            {{-- タイトル --}}
            <div class="site-title h-100 d-flex align-items-center justify-content-start ps-3">
                <a href="{{ url('/') }}" class="text-dark text-decoration-none">
                    {{ config('app_name', 'Site demo') }}
                </a>
            </div>{{-- ./site-title --}}

            {{-- SNSのリンク --}}
            <div class="sns-link h-100 d-flex align-items-center d-flex justify-content-end">
                <div class="h-50">
                    <a href="{{ config('sns-link', 'https://www.instagram.com/tama.goyakiclub') }}" target="_blank"
                        rel="noopener noreferrer">
                        <img src="{{ asset('storage/icon/instagram.png') }}" alt="instagram" class="h-100">
                    </a>
                </div>
                <div class="h-50">
                    <a href="{{ config('sns-link', 'https://github.com/nekkiChan') }}" target="_blank"
                        rel="noopener noreferrer">
                        <img src="{{ asset('storage/icon/github.png') }}" alt="github" class="h-100">
                    </a>
                </div>
                <div class="h-50">
                    <a href="{{ config('sns-link', 'https://twitter.com/tama5yakiClub') }}" target="_blank"
                        rel="noopener noreferrer">
                        <img src="{{ asset('storage/icon/twitter.png') }}" alt="twitter" class="h-100">
                    </a>
                </div>
            </div>{{-- ./sns-link --}}
        </div>{{-- ./header --}}

        <main class="py-4">
            @yield('content')
        </main>

        {{-- フッター --}}
        <div class="footer bg-white shadow-sm">
            <div class="page-link d-flex align-items-center justify-content-center">
                <div class="p-3"><a href="{{ url('/profile') }}" class="text-dark text-decoration-none">プロフィール</a></div>
                <div class="p-3"><a href="{{ url('/works') }}" class="text-dark text-decoration-none">実績・制作物</a></div>
                <div class="p-3"><a href="{{ url('/informations') }}" class="text-dark text-decoration-none">お知らせ</a></div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                &copy; 2023 nekkiChan
            </div>
        </div>{{-- ./footer --}}

    </div>
    {{-- </div#app> --}}
</body>

</html>
