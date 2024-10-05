@php
    if (empty($iconpath)) {
        $iconpath = 'triangle.svg';
    }
    if (empty($name)) {
        $name = '';
    }
    if (!empty($routepath)) {
        $linkpath = route($routepath);
    }
@endphp

@if (!empty($filepath))
    <div class="{{ $class }}">
        <img src="{{ asset('storage/uploads/' . $filepath) }}" alt="{{ $name }}">
    </div>
@elseif(!empty($linkpath))
    <div class="card_icon_field {{ $class }}" onclick="location.href='{{ $linkpath }}'">
        <img src="{{ asset('storage/assets/img/gray/' . $iconpath) }}" alt="{{ $name }}">
        @if (!empty($name))
            <div class="icon_text_field">
                {{ $name }}
            </div>
        @endif
    </div>
@endif
