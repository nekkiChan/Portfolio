@if (isset($class))
    <div class="content_field {{ $class }}">
        {{ $slot }}
    </div>
@elseif (isset($id))
    <div class="content_field" id="{{ $id }}">
        {{ $slot }}
    </div>
@else
    <div class="content_field">
        {{ $slot }}
    </div>
@endisset

