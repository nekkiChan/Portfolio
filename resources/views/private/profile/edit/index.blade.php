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

                <form action="{{ route('private.profile.edit.action') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id[0]" value="{{$login_user->id}}">

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
                                        $index = '0';
                                        $name = 'name';
                                        $value = $login_user->name;
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
                                        $index = '0';
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
