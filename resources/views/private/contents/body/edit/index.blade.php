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
                    @if ($content_bodies_data->count() > 0)

                        @foreach ($content_bodies_data as $key => $content_body_data)
                            <input type="hidden" name="id[{{ $key }}]" value="{{ $content_body_data->id }}">

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
                                            $value = '名前';
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
                                                $value = $content_body_data->$column;
                                                $placeholder = '名前';
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :placeholder="$placeholder">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- content_category_id --}}
                            @php
                                $column = 'content_category_id';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = 'カテゴリ';
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
                                                $value = $content_body_data->$column;
                                                $selectdata = $contents_categories_data->pluck('view', 'id')->toArray();
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :value="$value" :selectdata="$selectdata">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- content_subcategory_id --}}
                            @php
                                $column = 'content_subcategory_id';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = 'サブカテゴリ';
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
                                                $value = $content_body_data->$column;
                                                $selectdata = $contents_subcategories_data
                                                    ->pluck('view', 'id')
                                                    ->toArray();
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :selectdata="$selectdata">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- title --}}
                            @php
                                $column = 'title';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = 'タイトル';
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
                                                $type = 'text';
                                                $index = $key;
                                                $name = $column;
                                                $value = $content_body_data->$column;
                                                $placeholder = 'タイトル';
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :placeholder="$placeholder">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- body --}}
                            @php
                                $column = 'body';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = '内容';
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
                                                $type = 'ckeditor';
                                                $index = $key;
                                                $name = $column;
                                                $value = $content_body_data->$column;
                                                $placeholder = '内容';
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
                                                $value = $content_body_data->$column;
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
                                            $value = '表示順（表示項目の次に配置）';
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
                                                $next_smaller_data = $content_bodies_sumdata
                                                    ->where(
                                                        'content_subcategory_id',
                                                        $content_body_data->content_subcategory_id,
                                                    ) // content_subcategory_idが一致するものをフィルタ
                                                    ->where($column, '<', $content_body_data->sort) // sortが現在のものより小さいものをフィルタ
                                                    ->sortByDesc($column) // sortの値で降順にソート
                                                    ->first(); // 最初の要素を取得（次に小さい値）
                                                $type = 'select';
                                                $index = $key;
                                                $name = $column;
                                                $value = $next_smaller_data = $next_smaller_data
                                                    ? $next_smaller_data->sort
                                                    : 0;
                                                $selectdata = $content_bodies_sumdata
                                                    ->pluck('title', 'sort')
                                                    ->toArray();
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
                                        $value = '名前';
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
                                            $placeholder = '名前';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :placeholder="$placeholder">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- content_category_id --}}
                        @php
                            $column = 'content_category_id';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = 'カテゴリ';
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
                                            $selectdata = $contents_categories_data->pluck('view', 'id')->toArray();
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :value="$value" :selectdata="$selectdata">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- content_subcategory_id --}}
                        @php
                            $column = 'content_subcategory_id';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = 'サブカテゴリ';
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
                                            $selectdata = $contents_subcategories_data->pluck('view', 'id')->toArray();
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :selectdata="$selectdata">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- title --}}
                        @php
                            $column = 'title';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = 'タイトル';
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
                                            $placeholder = 'タイトル';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :placeholder="$placeholder">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- body --}}
                        @php
                            $column = 'body';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = '内容';
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                    </x-materials.input-field>
                                </div>
                            </x-materials.card-header-field>
                            <x-materials.card-body-field>
                                <div class="card_row">
                                    <div class="card_row_body">
                                        @php
                                            $type = 'ckeditor';
                                            $index = $key;
                                            $name = $column;
                                            $value = '';
                                            $placeholder = '内容';
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
                                        $value = '表示順（表示項目の次に配置）';
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
                                            $value = 0;
                                            $initSelectValue = '最後';
                                            $isempty = true;
                                            $selectdata = $content_bodies_sumdata->pluck('title', 'sort')->toArray();
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :initselectvalue="$initSelectValue"
                                            :isempty="$isempty" :selectdata="$selectdata">
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
