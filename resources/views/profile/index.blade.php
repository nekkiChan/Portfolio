@extends('layouts.app')

@section('content')
    <div class="profile-area">
        {{-- ページタイトル --}}
        <h1 class="page-title text-center">
            プロフィール
        </h1>{{-- /.page-title --}}

        {{-- コンテンツ --}}
        <div class="contents">
            <div class="abstract">
                {{-- 画像 --}}
                <div class="icon w-50 text-center">
                    <img src="{{ asset($data['image_name']) }}" alt="プロフィール画像" class="h-100">
                </div>{{-- profile-main-image --}}

                {{-- プロフィール（短め） --}}
                <div class="content">
                    <p><?php echo $data['short_text']; ?></p>
                </div>{{-- short --}}
            </div>

            {{-- プロフィール（長め） --}}
            <div class="content">
                <h2 class="item">プロフィール</h2>
                <p>{{ $data['main_text'] }}</p>
            </div>{{-- content --}}

            {{-- コンセプト --}}
            <div class="content">
                <h2 class="item">コンセプト</h2>
                <p>{{ $data['concept_text'] }}</p>
            </div>{{-- content --}}
        </div>{{-- ./contents --}}
    </div>
@endsection
