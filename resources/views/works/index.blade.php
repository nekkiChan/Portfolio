@extends('layouts.app')

@section('content')
    <div class="home-area">
        {{-- ページタイトル --}}
        <h1 class="page-title text-center">
            実績
        </h1>{{-- /.page-title --}}

        {{-- コンテンツ --}}
        <div class="contents">
            <p>{{ $works['title'] }}</p>
        </div>{{-- ./contents --}}
    </div>
@endsection

