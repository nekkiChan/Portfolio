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
                default:
                    break;
            }
        }
    @endphp
@endisset

@empty($classlist)
    <div class="button_field">
        {{ $value }}
    </div>
@else
    <div class="button_field {{ implode(' ', $classlist) }}">
        {{ $value }}
    </div>
@endempty
