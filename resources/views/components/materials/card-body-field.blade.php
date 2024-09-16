@isset($class)
    <div class="card_body_field {{ $class }}">
        {{ $slot }}
    </div>
@else
    <div class="card_body_field">
        {{ $slot }}
    </div>
@endisset
