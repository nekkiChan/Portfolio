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
                @foreach ($content_categories_data as $index => $content_category_data)
                    <x-materials.card-field>
                        @if ($index == 0)
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    {{ 'Menu' }}
                                </div>
                            </x-materials.card-header-field>
                        @endif
                        @if (!Auth::check())
                            @continue($content_category_data->is_admin)
                        @endif
                        <x-materials.card-body-field>
                            <div class="card_row">
                                <div class="card_row_body">
                                    <a class="row" href="#{{ $content_category_data->name }}">
                                        <div class="w-1/6">
                                            {{ $content_category_data->view }}
                                        </div>
                                        <div class="w-5/6 sm_hidden">
                                            {{ " - {$content_category_data->name} - " }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </x-materials.card-body-field>
                    </x-materials.card-field>
                @endforeach
            </div>
        </x-materials.content-field>

        @if ($owner_data->profile_icon_path)
            <x-materials.content-field>
                <div class="content_body">
                    <x-materials.card-field>
                        <x-materials.card-body-field>
                            <div class="card_row">
                                <div class="card_row_body">
                                    <div class="image_field">
                                        <img src="{{ asset("storage/uploads/$owner_data->profile_icon_path") }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </x-materials.card-body-field>
                    </x-materials.card-field>
                </div>
            </x-materials.content-field>
        @endif

        @foreach ($content_categories_data as $content_category_data)
            @if (!Auth::check())
                @continue($content_category_data->is_admin)
            @endif
            <x-materials.content-field :id="$content_category_data->name">
                <div class="content_header">
                    <div class="content_row">
                        {{ $content_category_data->view }}
                    </div>
                </div>
                <div class="content_body">
                    <x-materials.card-field>
                    </x-materials.card-field>
                </div>
            </x-materials.content-field>
        @endforeach
    </x-materials.container>
</x-app-layout>
