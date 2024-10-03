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

                {{-- content_title --}}
                <div class="content_header">
                    <div class="content_row flex items-center justify-left">
                        {{ 'カテゴリ：' }}
                        {{ $content_bodies_data->first()->category_view }}
                        {{ '>' }}
                        {{ $content_bodies_data->first()->subcategory_view }}
                    </div>
                    <div class="content_row flex items-center justify-left">
                        {{ 'タイトル：' }}
                        {{ $content_bodies_data->first()->title }}
                    </div>
                </div>
                <div class="content_space">
                </div>

                <div class="content_body">

                    @if ($service_links_data->count() > 0)

                        @foreach ($service_links_data as $key => $service_link_data)
                            <input type="hidden" name="id[{{ $key }}]" value="{{ $service_link_data->id }}">
                            <input type="hidden" name="content_body_id[{{ $key }}]"
                                value="{{ $content_bodies_data->first()->id }}">

                            {{-- service_category_id --}}
                            @php
                                $column = 'service_category_id';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = 'サービス名';
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
                                                $value = $service_link_data->$column;
                                                $selectdata = $service_categories_sumdata
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

                            {{-- link_path --}}
                            @php
                                $column = 'link_path';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = 'リンク';
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
                                                $value = $service_link_data->$column;
                                                $placeholder = 'リンク';
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value" :placeholder="$placeholder">
                                            </x-materials.input-field>
                                        </div>
                                    </div>
                                </x-materials.card-body-field>
                            </x-materials.card-field>

                            {{-- file_path --}}
                            @php
                                $column = 'file_path';
                            @endphp
                            <x-materials.card-field>
                                <x-materials.card-header-field>
                                    <div class="card_row">
                                        @php
                                            $type = null;
                                            $name = $column;
                                            $value = 'ファイル';
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
                                                $type = 'file';
                                                $index = $key;
                                                $name = $column;
                                                $value = $service_link_data->$column;
                                            @endphp
                                            <x-materials.input-field :type="$type" :name="$name"
                                                :index="$index" :value="$value">
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
                                                $value = $service_link_data->$column;
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
                        @endforeach
                    @else
                        @php
                            $key = 0;
                        @endphp
                        <input type="hidden" name="id[{{ $key }}]" value="">
                        <input type="hidden" name="content_body_id[{{ $key }}]"
                            value="{{ $content_bodies_data->first()->id }}">

                        {{-- service_category_id --}}
                        @php
                            $column = 'service_category_id';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = 'サービス名';
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
                                            $selectdata = $service_categories_sumdata->pluck('view', 'id')->toArray();
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :selectdata="$selectdata">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- link_path --}}
                        @php
                            $column = 'link_path';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = 'リンク';
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
                                            $placeholder = 'リンク';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value" :placeholder="$placeholder">
                                        </x-materials.input-field>
                                    </div>
                                </div>
                            </x-materials.card-body-field>
                        </x-materials.card-field>

                        {{-- file_path --}}
                        @php
                            $column = 'file_path';
                        @endphp
                        <x-materials.card-field>
                            <x-materials.card-header-field>
                                <div class="card_row">
                                    @php
                                        $type = null;
                                        $name = $column;
                                        $value = 'ファイル';
                                    @endphp
                                    <x-materials.input-field :type="$type" :name="$name" :value="$value">
                                    </x-materials.input-field>
                                </div>
                            </x-materials.card-header-field>
                            <x-materials.card-body-field>
                                <div class="card_row">
                                    <div class="card_row_body">
                                        @php
                                            $type = 'file';
                                            $index = $key;
                                            $name = $column;
                                            $value = '';
                                        @endphp
                                        <x-materials.input-field :type="$type" :name="$name"
                                            :index="$index" :value="$value">
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
