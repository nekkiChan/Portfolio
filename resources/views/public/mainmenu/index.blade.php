<x-guest-layout>

    @php
        $csspath = 'assets/css/' . config("screen.$config_path.csspath") . 'app.css';
    @endphp
    <link href="{{ asset('storage/assets/css/public/mainmenu/index/app.css') }}?v={{ time() }}" rel="stylesheet">

    <x-materials.container>
        テスト
    </x-materials.container>
</x-guest-layout>
