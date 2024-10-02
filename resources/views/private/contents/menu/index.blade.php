<x-app-layout>

    @php
        $csspath = 'storage/assets/css/' . config("screens.$config_path.csspath") . 'app.css';
        $login_user = session('login_user');
    @endphp
    <link href="{{ asset($csspath) }}?v={{ time() }}" rel="stylesheet">

    <x-materials.container>
        <x-materials.content-field>
            @include('common.content-row-pagetitle')
            @include('common.content-row-profile')
            @include('common.content-row-errors')

            <div class="content_body">
                <form action="{{ route(str_replace('index', 'action', $route_path)) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    @foreach ($owners_data as $key => $owner_data)
                        <input type="hidden" name="id[{{ $key }}]" value="{{ $owner_data->id }}">

                        {{-- name --}}
                        @php
                            $column = 'name';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = 'サイト所有者名';
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                    </x-materials.input-field>
                                </div>
                            </x-materials.card-header-field>
                            <x-materials.card-body-field>
                                <div class="card_row">
                                    <div class="card_row_body">
                                        @php
                                            $type = 'text';
                                            $index = $key;
                                            $name = $column;
                                            $value = $owner_data->$column;
                                            $placeholder = 'ユーザー名';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name" :index="$index"
                                            :value="$value" :placeholder="$placeholder">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                    @endforeach

                    <x-materials.card-field>
                        <x-materials.card-body-field>
                            <div class="card_row">
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
                        </x-materials.card-body-field>
                    </x-materials.card-field>

                </form>
            </div>

        </x-materials.content-field>
    </x-materials.container>
</x-app-layout>
