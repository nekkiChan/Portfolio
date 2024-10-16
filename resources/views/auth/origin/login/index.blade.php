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

                <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    {{-- name --}}
                    <x-materials.card-field>
                        <x-materials.card-header-field>
                            <div class="card_row">
                                @php
                                    $type = null;
                                    $name = 'name';
                                    $value = 'ユーザー名';
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
                                        $index = 'once';
                                        $name = 'name';
                                        $value = '';
                                        $placeholder = 'ユーザー名';
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :index="$index"
                                        :value="$value" :placeholder="$placeholder">
                                    </x-materials.input-field>
                                </div>
                            </div>
                        </x-materials.card-body-field>
                    </x-materials.card-field>

                    {{-- password --}}
                    <x-materials.card-field>
                        <x-materials.card-header-field>
                            <div class="card_row">
                                @php
                                    $type = null;
                                    $name = 'password';
                                    $value = 'パスワード';
                                @endphp
                                <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                </x-materials.input-field>
                            </div>
                        </x-materials.card-header-field>
                        <x-materials.card-body-field>
                            <div class="card_row">
                                <div class="card_row_body">
                                    @php
                                        $type = 'password';
                                        $index = 'once';
                                        $name = 'password';
                                        $value = '';
                                        $placeholder = 'パスワード';
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :index="$index"
                                        :value="$value" :placeholder="$placeholder">
                                    </x-materials.input-field>
                                </div>
                            </div>
                        </x-materials.card-body-field>
                    </x-materials.card-field>

                    <x-materials.card-field>
                        <x-materials.card-body-field>
                            <div class="card_row">
                                <div class="form_footer">
                                    @php
                                        $value = 'ログイン';
                                        $trigger = 'update';
                                    @endphp
                                    <x-materials.button-field :trigger="$trigger" :value="$value">
                                    </x-materials.button-field>
                                </div>
                        </x-materials.card-body-field>
                    </x-materials.card-field>

                </form>
            </div>

        </x-materials.content-field>
    </x-materials.container>
</x-app-layout>
