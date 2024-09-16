@if (isset($class))
    <div class="card_field {{ $class }}">
        {{ $slot }}
    </div>
@elseif (isset($id))
    <div class="card_field" id="{{ $id }}">
        {{ $slot }}
    </div>
@else
    <div class="card_field">
        {{ $slot }}
    </div>
@endisset
