@extends('administrators.layouts.app')

@section('administrators-field')
    <div class="create-area">
        {{-- ページタイトル --}}
        <h1 class="page-title text-center">
            お知らせ
        </h1>{{-- /.page-title --}}

        {{-- コンテンツ --}}
        <div class="contents">
            {{-- プロフィール --}}
            <div class="content">

                {{-- 入力欄 --}}
                <div class="input-area text-center">
                    <form action="{{ route('information.store') }}" enctype='multipart/form-data' method="post">
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

                        {{-- 説明 --}}
                        <div class="input-content">
                            <div class="input-title">
                                <label for="explanation">説明</label>
                            </div>{{-- ./input-title --}}
                            <div class="input-box">
                                <textarea name="explanation" id="explanation">{{ old('explanation') }}</textarea>
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

                        {{-- Work ID --}}
                        <div class="input-content">
                            <div class="input-title">
                                <label for="work_id">Work ID</label>
                            </div>{{-- ./input-title --}}
                            <div class="input-box">
                                <input type="number" name="work_id" id="work_id" value="{{ old('work_id') }}">
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
