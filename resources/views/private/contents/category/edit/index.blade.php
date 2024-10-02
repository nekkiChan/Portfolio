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
                    @if ($contents_categories_data->count() > 0)

                        @foreach ($contents_categories_data as $key => $contents_category_data)
                            <input type="hidden" name="id[{{ $key }}]" value="{{ $contents_category_data->id }}">

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
                                            $value = 'カテゴリ名';
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
                                                $value = $contents_category_data->$column;
                                                $placeholder = 'カテゴリ名';
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :placeholder="$placeholder">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- view --}}
                            @php
                                $column = 'view';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = 'カテゴリ名（表示）';
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
                                                $value = $contents_category_data->$column;
                                                $placeholder = 'カテゴリ名（表示）';
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :placeholder="$placeholder">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- is_admin --}}
                            @php
                                $column = 'is_admin';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = '公開範囲';
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
                                                $value = $contents_category_data->$column;
                                                $selectdata = [
                                                    0 => '一般公開',
                                                    1 => '限定公開',
                                                ];
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :selectdata="$selectdata">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- sort --}}
                            @php
                                $column = 'sort';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = '表示順';
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
                                                $type = 'number';
                                                $index = $key;
                                                $name = $column;
                                                $value = $contents_category_data->$column;
                                                $placeholder = '表示順';
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :placeholder="$placeholder">
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
                                        $value = 'カテゴリ名';
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
                                            $value = '';
                                            $placeholder = 'カテゴリ名';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :placeholder="$placeholder">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- view --}}
                        @php
                            $column = 'view';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = 'カテゴリ名（表示）';
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
                                            $value = '';
                                            $placeholder = 'カテゴリ名（表示）';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :placeholder="$placeholder">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- is_admin --}}
                        @php
                            $column = 'is_admin';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = '公開範囲';
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
                                            $value = 0;
                                            $selectdata = [
                                                0 => '一般公開',
                                                1 => '限定公開',
                                            ];
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :selectdata="$selectdata">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- sort --}}
                        @php
                            $column = 'sort';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = '表示順';
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                    </x-materials.input-field>
                                </div>
                            </x-materials.card-header-field>
                            <x-materials.card-body-field>
                                <div class="card_row">
                                    <div class="card_row_body">
                                        @php
                                            $type = 'number';
                                            $index = $key;
                                            $name = $column;
                                            $value = $contents_categories_sumdata->count();
                                            $placeholder = '表示順';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :placeholder="$placeholder">
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
