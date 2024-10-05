<x-app-layout>

    @php
        $csspath = 'storage/assets/css/' . config("screens.$config_path.csspath") . 'app.css';
        $login_user = session('login_user');
        $form_action_url = route(str_replace('index', 'action', $route_path));
    @endphp
    <link href="{{ asset($csspath) }}?v={{ time() }}" rel="stylesheet">
    {{-- @dd($content_bodies_data,$service_links_data) --}}
    <x-materials.container>

        <form action="{{ route(str_replace('index', 'action', $route_path)) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <x-materials.content-field>
                @include('common.content-row-pagetitle')
                @include('common.content-row-profile')
                @include('common.content-row-errors')

                @foreach ($content_bodies_data as $index => $content_body_data)
                    @php
                        $title = $content_body_data->title;
                        $body = $content_body_data->body;

                        // link
                        $service_link_filter_data = $service_links_data->where(
                            'content_body_id',
                            $content_body_data->id,
                        );
                    @endphp
                    <div class="content_body">
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = 'title';
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
                                            $name = 'body';
                                            $value = $body;
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        @if ($service_link_filter_data->count() > 0)
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
                        @endif
                    </div>

                    @break($content_bodies_data->count() == $index + 1)

                    <div class="content_space">
                    </div>
                @endforeach

            </x-materials.content-field>

            {{-- ボタンフィールド --}}
            <x-materials.content-field>

                <div class="content_body">
                    <div class="form_footer">

                        @php
                            $trigger = 'back';
                        @endphp
                        <x-materials.button-field :trigger="$trigger">
                        </x-materials.button-field>
                    </div>
                </div>

            </x-materials.content-field>
        </form>
    </x-materials.container>
</x-app-layout>
