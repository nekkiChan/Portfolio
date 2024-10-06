<x-app-layout>

    @php
        $csspath = 'storage/assets/css/' . config("screens.$config_path.csspath") . 'app.css';
        $login_user = session('login_user');
    @endphp
    <link href="{{ asset($csspath) }}?v={{ time() }}" rel="stylesheet">

    <x-materials.container>

        <form action="{{ route(str_replace('index', 'action', $route_path), $request->query()) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <x-materials.content-field>
                @include('common.content-row-pagetitle')
                @include('common.content-row-profile')
                @include('common.content-row-errors')

                <div class="content_body">
                    @if ($users_data->count() > 0)

                        @foreach ($users_data as $key => $user_data)
                            <input type="hidden" name="id[{{ $key }}]" value="{{ $user_data->id }}">

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
                                                $index = $key;
                                                $name = $column;
                                                $value = $user_data->$column;
                                                $placeholder = 'ユーザー名';
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :placeholder="$placeholder">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- email --}}
                            @php
                                $column = 'email';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = 'メールアドレス';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                        </x-materials.input-field>
                                    </div>
                                </x-materials.card-header-field>
                                <x-materials.card-body-field>
                                    <div class="card_row">
                                        <div class="card_row_body">
                                            @php
                                                $type = 'email';
                                                $index = $key;
                                                $name = $column;
                                                $value = $user_data->$column;
                                                $placeholder = 'メールアドレス';
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :placeholder="$placeholder">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- password --}}
                            @php
                                $column = 'password';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = 'パスワード';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :value="$value">
                                        </x-materials.input-field>
                                    </div>
                                </x-materials.card-header-field>
                                <x-materials.card-body-field>
                                    <div class="card_row">
                                        <div class="card_row_body">
                                            @php
                                                $type = 'password';
                                                $index = $key;
                                                $name = $column;
                                                $value = $user_data->$column;
                                                $placeholder = 'パスワード';
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :placeholder="$placeholder">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- role_id --}}
                            @php
                                $column = 'role_id';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = '権限';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :value="$value">
                                        </x-materials.input-field>
                                    </div>
                                </x-materials.card-header-field>
                                <x-materials.card-body-field>
                                    <div class="card_row">
                                        <div class="card_row_body">
                                            @php
                                                $type = 'select';
                                                $index = $key;
                                                $name = $column;
                                                $value = $user_data->$column;
                                                $selectdata = $roles_data->pluck('name', 'id')->toArray();
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :selectdata="$selectdata">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- is_disable --}}
                            @php
                                $column = 'is_disable';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = '状態';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :value="$value">
                                        </x-materials.input-field>
                                    </div>
                                </x-materials.card-header-field>
                                <x-materials.card-body-field>
                                    <div class="card_row">
                                        <div class="card_row_body">
                                            @php
                                                $type = 'select';
                                                $index = $key;
                                                $name = $column;
                                                $value = $user_data->$column;
                                                $selectdata = [
                                                    0 => '有効',
                                                    1 => '無効',
                                                ];
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :selectdata="$selectdata">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>
                        @endforeach
                    @else
                        @php
                            $key = 0;
                        @endphp
                        <input type="hidden" name="id[{{ $key }}]" value="">

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
                                            $index = $key;
                                            $name = $column;
                                            $value = null;
                                            $placeholder = 'ユーザー名';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :placeholder="$placeholder">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- email --}}
                        @php
                            $column = 'email';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = 'メールアドレス';
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                    </x-materials.input-field>
                                </div>
                            </x-materials.card-header-field>
                            <x-materials.card-body-field>
                                <div class="card_row">
                                    <div class="card_row_body">
                                        @php
                                            $type = 'email';
                                            $index = $key;
                                            $name = $column;
                                            $value = null;
                                            $placeholder = 'メールアドレス';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :placeholder="$placeholder">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- password --}}
                        @php
                            $column = 'password';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
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
                                            $index = $key;
                                            $name = $column;
                                            $value = null;
                                            $placeholder = 'パスワード';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :placeholder="$placeholder">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- role_id --}}
                        @php
                            $column = 'role_id';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = '権限';
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                    </x-materials.input-field>
                                </div>
                            </x-materials.card-header-field>
                            <x-materials.card-body-field>
                                <div class="card_row">
                                    <div class="card_row_body">
                                        @php
                                            $type = 'select';
                                            $index = $key;
                                            $name = $column;
                                            $value = null;
                                            $selectdata = $roles_data->pluck('name', 'id')->toArray();
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :selectdata="$selectdata">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- is_disable --}}
                        @php
                            $column = 'is_disable';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = '状態';
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                    </x-materials.input-field>
                                </div>
                            </x-materials.card-header-field>
                            <x-materials.card-body-field>
                                <div class="card_row">
                                    <div class="card_row_body">
                                        @php
                                            $type = 'select';
                                            $index = $key;
                                            $name = $column;
                                            $value = 1;
                                            $selectdata = [
                                                0 => '有効',
                                                1 => '無効',
                                            ];
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :selectdata="$selectdata">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                    @endif
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
