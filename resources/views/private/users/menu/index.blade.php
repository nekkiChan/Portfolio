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

            @php
                $transition_data = config("screens.$config_path.transition_data");
            @endphp
            
            @foreach ($transition_data as $trans_data)
                <x-materials.content-field>

                    <div class="content_header">
                        {{ $trans_data['view'] }}
                    </div>

                    <div class="content_body">
                        @foreach ($trans_data['data'] as $column => $data)
                            @continue($data['level'] > $login_user->level)
                            <x-materials.card-field>
                                @php
                                    $icon_path = $data['iconpath'];
                                    $config_path = $data['configpath'];
                                    $route_path = $data['routepath'];
                                    $count = 0;
                                    $name = config("screens.$config_path")['pagetitle']['transition'];
                                @endphp
                                <x-materials.card-icon-field :class="$column" :iconpath="$icon_path" :routepath="$route_path"
                                    :count="$count" :name="$name">
                                </x-materials.card-icon-field>
                            </x-materials.card-field>
                        @endforeach
                    </div>
                </x-materials.content-field>

            @endforeach

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
