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
                <div class="card mb-3 m-2">
                    <div class="row g-0">
                        <div class="icon col-md-4 p-2">
                            <img src="{{ asset($data['information']['image']) }}" alt="..." class="w-100">
                        </div>
                        <div class="abstract col-md-8 p-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data['information']['title'] }}</h5>
                                <p class="card-text">
                                    [<a href="{{ url('/informations') }}">more</a>]
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        {{ $data['information']['created_at'] }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 m-2">
                    <div class="row g-0">
                        <div class="icon col-md-4 p-2">
                            <img src="{{ asset($data['information']['image']) }}" alt="..." class="w-100">
                        </div>
                        <div class="abstract col-md-8 p-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data['information']['title'] }}</h5>
                                <p class="card-text">
                                    [<a href="{{ url('/informations') }}">more</a>]
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        {{ $data['information']['created_at'] }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- ./content --}}
        </div>{{-- ./contents --}}
    </div>
@endsection
