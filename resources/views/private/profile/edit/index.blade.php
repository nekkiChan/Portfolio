<x-app-layout>

    @php
        $csspath = 'storage/assets/css/' . config("screens.$config_path.csspath") . 'app.css';
    @endphp
    <link href="{{ asset($csspath) }}?v={{ time() }}" rel="stylesheet">

    <x-materials.container>
        <x-materials.content-field>
            @include('common.content-row-pagetitle')
            @include('common.content-row-profile')
            @include('common.content-row-errors')

            <div class="content_body">
            </div>
        </x-materials.content-field>
    </x-materials.container>
</x-app-layout>
