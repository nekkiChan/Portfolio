<x-app-layout>

    @php
        $csspath = 'storage/assets/css/' . config("screens.$config_path.csspath") . 'app.css';
        $content_category_config_data = config('dbtables.m101_content_categories.initdata');
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

        @foreach ($content_subcategories_data as $content_subcategory_data)
            @php
                // body
                $content_bodies_filter_data = $content_bodies_data->where(
                    'content_subcategory_id',
                    $content_subcategory_data->id,
                );
                // link
                $service_link_filter_data = $service_links_data->where(
                    'content_subcategory_id',
                    $content_subcategory_data->id,
                );
            @endphp

            @continue($content_bodies_filter_data->count() == 0)

            <x-materials.content-field :id="$content_subcategory_data->parent_name">
                <div class="content_header">
                    <div class="content_row">
                        {{ $content_subcategory_data->parent_view }}
                    </div>
                </div>
                <div class="content_body">

                    @foreach ($content_bodies_filter_data as $content_body_data)
                        @php
                            // link
                            $service_link_filter_data = $service_link_filter_data->where(
                                'content_body_id',
                                $content_body_data->id,
                            );
                        @endphp

                        @php
                            $column = 'body';
                            $title = $content_body_data->title;
                            $body = $content_body_data->body;
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = $title;
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                    </x-materials.input-field>
                                </div>
                            </x-materials.card-header-field>
                            <x-materials.card-body-field>
                                <div class="card_row">
                                    <div class="card_row_body">
                                        @php
                                            $type = 'dom';
                                            $name = $column;
                                            $value = $body;
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>


                        @continue($service_link_filter_data->count() == 0)

                        @foreach ($service_link_filter_data as $service_link_data)
                            @continue($content_body_data->id != $service_link_data->content_body_id)

                            @php
                                $column = 'link';
                                $title = $content_body_data->title;
                                $body = $content_body_data->body;
                            @endphp
                            <x-materials.card-field>

                                @php
                                    $iconpath = $service_link_data->icon_image_path;
                                    $linkpath = $service_link_data->link_path;
                                    $filepath = $service_link_data->file_path;
                                    $class = "$service_link_data->name blank link";
                                    $name = $service_link_data->view;
                                @endphp
                                <x-materials.card-icon-field :iconpath="$iconpath" :linkpath="$linkpath" :filepath="$filepath"
                                    :class="$class" :name="$name">
                                </x-materials.card-icon-field>
                            </x-materials.card-field>
                        @endforeach
                    @endforeach

                    @php
                        // more
                        $linkpath = route('public.mainmenu.index');
                        $content_category_id = $content_subcategory_data->content_category_id;
                        foreach ($content_category_config_data as $id => $data) {
                            if ($content_category_id == $id + 1) {
                                switch ($data['name']) {
                                    case 'profile':
                                        $linkpath = route('public.mainmenu.index', ['id' => $id]);
                                        break;
                                    case 'carrer':
                                        $linkpath = route('public.mainmenu.index', ['id' => $id]);
                                        break;
                                    case 'works':
                                        $linkpath = route('public.mainmenu.index', ['id' => $id]);
                                        break;
                                    default:
                                        break;
                                }
                                break;
                            }
                        }
                    @endphp
                    <x-materials.card-field>
                        <x-materials.card-body-field>
                            <div class="card_row">
                                <div class="card_row_body">
                                    <div class="input_field">
                                        <div class="text_field">
                                            <div class="more" onclick="location.href='{{ $linkpath }}'">
                                                {{ 'more>' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-materials.card-body-field>
                    </x-materials.card-field>

                </div>
            </x-materials.content-field>
        @endforeach
    </x-materials.container>

</x-app-layout>
