@extends('administrators.layouts.app')

@section('administrators-field')

<div class="create-area">
    {{-- ページタイトル --}}
    <h1 class="page-title text-center">
        管理者情報編集画面2
    </h1>{{-- /.page-title --}}

    {{-- コンテンツ --}}
    <div class="contents">
        {{-- プロフィール --}}
        <div class="content">

            {{-- 入力欄 --}}
            <div class="input-area">
                <form action="{{ route('work.store') }}" enctype='multipart/form-data' method="post">
                    @csrf
                    {{-- 名前 --}}
                    <div class="input-content">
                        <div class="input-title">
                            名前
                        </div>{{-- ./input-title --}}
                        <div class="input-box">
                            <input type="text" name="name" value="{{ old('name') }}" required>
                        </div>{{-- ./input-box --}}
                    </div>{{-- ./input-content --}}

        </div>{{-- ./content --}}
    </div>{{-- ./contents --}}
</div>

@endsection
