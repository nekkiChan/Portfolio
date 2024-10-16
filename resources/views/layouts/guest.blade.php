<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- CSS --}}
    <link href="{{ asset('storage/assets/css/app.css') }}?v={{ time() }}" rel="stylesheet" />
    <link href="{{ asset('storage/assets/css/appsm.css') }}?v={{ time() }}" rel="stylesheet" />
</head>

<body class="font-sans text-gray-900 antialiased">

    <!-- Page Heading -->
    <header class="bg-white shadow">
        @include('layouts.header')
    </header>

    <main>
        {{ $slot }}
    </main>
</body>

<footer>
    @include('common.javascript')
</footer>

</html>
