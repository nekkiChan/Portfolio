@extends('layouts.app')

@section('content')
    <div class="row">

        {{-- サイドバー --}}
        <div class="col-12 col-md-4 col-lg-3">
            @include('administrators.sidebar.app')
        </div>

        {{-- 管理者用フィールド --}}
        <div class="col-12 col-md-8 col-lg-9">
            @yield('administrators-field')
        </div>

    </div>
@endsection
