@isset($class)
    <div class="card_header_field {{ $class }}">
        {{ $slot }}
    </div>
@else
    <div class="card_header_field">
        {{ $slot }}
    </div>
@endisset
