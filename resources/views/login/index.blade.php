@extends('layouts.app')

@section('content')
    <div class="login-area">
        {{-- ページタイトル --}}
        <h1 class="page-title text-center">
            管理者ページ
        </h1>{{-- /.page-title --}}

        {{-- コンテンツ --}}
        <div class="contents">
            <div class="content">
                <h2 class=item>ログイン</h2>
                <div class="input-area text-center">
                    <div class="input-content">
                        <div class="input-title">
                            メールアドレス
                        </div>{{-- ./input-title --}}
                        <div class="input-box">
                            <input type="text" name="" id="">
                        </div>{{-- ./input-box --}}
                    </div>{{-- ./input-content --}}
                    <div class="input-content">
                        <div class="input-title">
                            パスワード
                        </div>{{-- ./input-title --}}
                        <div class="input-box">
                            <input type="text" name="" id="">
                        </div>{{-- ./input-box --}}
                    </div>{{-- ./input-content --}}
                    <input type="submit" value="ログイン">
                </div>{{-- ./input-area --}}
            </div>{{-- ./content --}}
        </div>{{-- ./contents --}}
    </div>
@endsection
