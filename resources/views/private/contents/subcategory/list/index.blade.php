<x-app-layout>

    @php
        $csspath = 'storage/assets/css/' . config("screens.$config_path.csspath") . 'app.css';
        $login_user = session('login_user');
    @endphp
    <link href="{{ asset($csspath) }}?v={{ time() }}" rel="stylesheet">

    <x-materials.container>

        <form action="{{ route(str_replace('index', 'action', $route_path)) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <x-materials.content-field>
                @include('common.content-row-pagetitle')
                @include('common.content-row-profile')
                @include('common.content-row-errors')
            </x-materials.content-field>

            <x-materials.content-field>

                <div class="content_body">
                    @foreach ($contents_subcategories_data as $key => $contents_subcategory_data)
                        @php
                            $routeurl = route(str_replace('list', 'edit', $route_path), [
                                'id' => $contents_subcategory_data->id,
                            ]);
                        @endphp
                        <x-materials.card-field :routeurl="$routeurl">
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $contents_subcategory_data->name;
                                        $value = $contents_subcategory_data->view;
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                    </x-materials.input-field>
                                </div>
                            </x-materials.card-header-field>

                            {{-- is_admin --}}
                            @php
                                $column = 'is_admin';
                            @endphp
                            <x-materials.card-body-field>
                                <div class="card_row">
                                    <div class="card_row_title">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = '一般公開';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                        </x-materials.input-field>
                                    </div>
                                    <div class="card_row_body">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = $contents_subcategory_data->$column ? '不可' : '可';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>
                    @endforeach
                </div>
            </x-materials.content-field>

            {{-- ボタンフィールド --}}
            <x-materials.content-field>

                <div class="content_body">
                    <div class="form_footer">
                        @php
                            $trigger = 'update';
                        @endphp
                        <x-materials.button-field :trigger="$trigger">
                        </x-materials.button-field>


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
