@extends('administrators.layouts.app')

@section('administrators-field')
    <div class="create-area">
        {{-- ページタイトル --}}
        <h1 class="page-title text-center">
            実績
        </h1>{{-- /.page-title --}}

        {{-- コンテンツ --}}
        <div class="contents">
            {{-- プロフィール --}}
            <div class="content">

                {{-- 入力欄 --}}
                <div class="input-area">
                    <form action="{{ route('work.store') }}" enctype='multipart/form-data' method="post">
                        @csrf
                        {{-- タイトル --}}
                        <div class="input-content">
                            <div class="input-title">
                                <label for="title">タイトル</label>
                            </div>{{-- ./input-title --}}
                            <div class="input-box">
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                            </div>{{-- ./input-box --}}
                        </div>{{-- ./input-content --}}

                        <div class="input-content">
                            <table class="input-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="input-title">サービス名</div>{{-- ./input-title --}}
                                        </th>
                                        <th>
                                            <div class="input-title">リンクURL</div>{{-- ./input-title --}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="input-box">
                                                <input type="text" name="link_name[]" required>
                                            </div>{{-- ./input-box --}}
                                        </td>
                                        <td>
                                            <div class="input-box">
                                                <input type="text" name="link_url[]" required>
                                            </div>{{-- ./input-box --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>{{-- ./input-content --}}
                        <button id='addLink' type='button'>リンクの追加</button>

                        {{-- 説明 --}}
                        <div class="input-content">
                            <div class="input-title">
                                <label for="explanation">説明</label>
                            </div>{{-- ./input-title --}}
                            <div class="input-box">
                                <textarea name="explanation" id="explanation">{{ old('explanation') }}</textarea>
                            </div>{{-- ./input-box --}}
                        </div>{{-- ./input-content --}}

                        {{-- コメント --}}
                        <div class="input-content">
                            <div class="input-title">
                                <label for="comment">コメント</label>
                            </div>{{-- ./input-title --}}
                            <div class="input-box">
                                <textarea name="comment" id="comment">{{ old('comment') }}</textarea>
                            </div>{{-- ./input-box --}}
                        </div>{{-- ./input-content --}}

                        {{-- 画像 --}}
                        <div class="input-content">
                            <div class="input-title">
                                <label for="image">画像</label>
                            </div>{{-- ./input-title --}}
                            <div class="input-box">
                                <input type="file" name="image" id="image" value="{{ old('image') }}">
                            </div>{{-- ./input-box --}}
                        </div>{{-- ./input-content --}}

                        {{-- タグ --}}
                        <div class="input-content">
                            <table class="input-table input-tag">
                                <tr>
                                    <td>
                                        <div class="input-title">タグ</div>{{-- ./input-title --}}
                                    </td>
                                    <td>
                                        <div class="input-box">
                                            <input type="text" name="tag_name[]">
                                        </div>{{-- ./input-box --}}
                                    </td>
                                </tr>
                            </table>
                        </div>{{-- ./input-content --}}
                        <button id='addTag' type='button'>タグの追加</button>

                        {{-- 完了ボタン --}}
                        <div class="input-content">
                            <button type="submit">完了</button>
                        </div>{{-- ./input-content --}}
                    </form>
                </div>{{-- ./input-area --}}

            </div>{{-- ./content --}}
        </div>{{-- ./contents --}}
    </div>
@endsection
