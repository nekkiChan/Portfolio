<x-guest-layout>

    @php
        $csspath = 'assets/css/' . config("screen.$config_path.csspath") . 'app.css';
    @endphp
    <link href="{{ asset('storage/assets/css/public/mainmenu/index/app.css') }}?v={{ time() }}" rel="stylesheet">

    <x-materials.container>
        <x-materials.content-field>
            <div class="content_header">
                テスト
            </div>
            <div class="content_space"></div>
            <div class="content_body">
                テスト
            </div>
        </x-materials.content-field>
    </x-materials.container>
</x-guest-layout>
