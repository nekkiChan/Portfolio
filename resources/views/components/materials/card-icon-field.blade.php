
@php
    if(empty($iconpath)){
        $iconpath = 'triangle.svg';
    }
    if(empty($name)){
        $name = '';
    }
@endphp
<div class="card_icon_field {{ $class }}" onclick="location.href='{{ route($routepath) }}'">
    <img src="{{ asset('storage/assets/img/gray/' . $iconpath) }}" alt="{{ $name }}">
    @if (!empty($name))
    <div class="icon_text_field">
        {{ $name }}
    </div>
    @endif
</div>
