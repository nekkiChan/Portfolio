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
            <div class="content">
                <h2 class="item">プロフィール</h2>
                <p>
                    {{ $data['short_text'] }}
                    [<a href="{{ url('/profile') }}">more</a>]
                </p>
            </div>{{-- ./content --}}
            {{-- 実績 --}}
            <div class="content">
                <h2 class="item">実績・制作物</h2>
                    <p>{{ $data['work'] }}</p>
            </div>{{-- ./content --}}
            {{-- お知らせ --}}
            <div class="content">
                <h2 class="item">お知らせ</h2>
                <p>
                    No.{{ $data['info']['id'] }}:
                    {{ $data['info']['name'] }}
                    [<a href="{{ url('/informations') }}">more</a>]
                </p>
            </div>{{-- ./content --}}
        </div>{{-- ./contents --}}
    </div>
@endsection
