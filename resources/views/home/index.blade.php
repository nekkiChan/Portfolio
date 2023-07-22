@extends('layouts.app')

@section('content')
    <div class="home-area">
        {{-- ページタイトル --}}
        <h1 class="page-title text-center">
            NekkiChan
        </h1>{{-- /.page-title --}}

        {{-- 画像 --}}
        <div class="top-image text-center">
            <img src="{{ asset('storage/sample/profile.png') }}" alt="" class="h-100">
        </div>

        {{-- コンテンツ --}}
        <div class="contents">
            {{-- プロフィール --}}
            <div class="profile">
                <h2>プロフィール</h2>
                <p>
                    {{ $home['short'] }}
                </p>
            </div>{{-- ./profile --}}
            {{-- 実績 --}}
            <div class="works">
                <h2>実績・制作物</h2>
            </div>{{-- ./works --}}
            {{-- お知らせ --}}
            <div class="informations">
                <h2>お知らせ</h2>
                <p>
                    {{ $home['info']['name'] }}
                    [<a href="{{ url('/informations/more') }}">more</a>]
                </p>
            </div>{{-- ./informations --}}
        </div>{{-- ./contents --}}
    </div>
@endsection
