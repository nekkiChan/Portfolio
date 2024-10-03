@php
    $classlist = [];
@endphp

@isset($class)
    @php
        $classlist[] = $class;
    @endphp
@endisset

@isset($value)
@else
    @php
        $value = '';
    @endphp
@endisset

@isset($trigger)
    @php
        $classlist[] = $trigger;
        $classlist[] = 'trigger';
        if (empty($value)) {
            switch ($trigger) {
                case 'update':
                    $value = '更新';
                    break;
                case 'back':
                    $value = '戻る';
                    break;
                default:
                    break;
            }
        }
    @endphp
@endisset

@if (empty($classlist))
    <div class="button_field">
        {{ $value }}
    </div>
@elseif (!empty($linkpath))
    <div class="button_field {{ implode(' ', $classlist) }}" onclick="location.href='{{ $linkpath }}'">
        {{ $value }}
    </div>
@else
    <div class="button_field {{ implode(' ', $classlist) }}">
        {{ $value }}
    </div>
@endif
