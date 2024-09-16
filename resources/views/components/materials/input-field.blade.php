@if (!isset($value))
    @php
        $value = '';
    @endphp
@endif

@if (!isset($placeholder))
    @php
        $placeholder = '';
    @endphp
@endif

<div class="input_field">
    <div class="text_field">
        @if (isset($type))
            @if (isset($index))
                @if ($index != 'once')
                    @switch($type)
                        @case('text')
                            <input type="{{ $type }}" class="{{ $name }}" name="{{ "{$name}[{$index}]" }}"
                                value="{{ $value }}" placeholder="{{ $placeholder }}">
                        @break

                        @case('number')
                            <input type="{{ $type }}" class="{{ $name }}" name="{{ "{$name}[{$index}]" }}"
                                value="{{ $value }}" placeholder="{{ $placeholder }}">
                        @break

                        @case('password')
                            <input type="{{ $type }}" class="{{ $name }}" name="{{ "{$name}[{$index}]" }}"
                                value="{{ $value }}" placeholder="{{ $placeholder }}">
                        @break

                        @case('select')
                            @isset($selectdata)
                                <select class="{{ $name }}" name="{{ "{$name}[{$index}]" }}">
                                    @foreach ($selectdata as $key => $option)
                                        <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                            @endisset
                        @break
                    @endswitch
                @else
                    @switch($type)
                        @case('text')
                            <input type="{{ $type }}" class="{{ $name }}" name="{{ "{$name}" }}"
                                value="{{ $value }}" placeholder="{{ $placeholder }}">
                        @break

                        @case('number')
                            <input type="{{ $type }}" class="{{ $name }}" name="{{ "{$name}" }}"
                                value="{{ $value }}" placeholder="{{ $placeholder }}">
                        @break

                        @case('password')
                            <input type="{{ $type }}" class="{{ $name }}" name="{{ "{$name}" }}"
                                value="{{ $value }}" placeholder="{{ $placeholder }}">
                        @break

                        @case('select')
                            @isset($selectdata)
                                <select class="{{ $name }}" name="{{ "{$name}" }}">
                                    @foreach ($selectdata as $key => $option)
                                        <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                            @endisset
                        @break
                    @endswitch
                @endif
            @else
                @switch($type)
                    @case('text')
                        <input type="{{ $type }}" class="{{ $name }}" value="{{ $value }}"
                            placeholder="{{ $placeholder }}">
                    @break

                    @case('number')
                        <input type="{{ $type }}" class="{{ $name }}" value="{{ $value }}"
                            placeholder="{{ $placeholder }}">
                    @break

                    @case('select')
                        @isset($selectdata)
                            <select class="{{ $name }}">
                                @foreach ($selectdata as $key => $option)
                                    <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                        @endisset
                    @break
                @endswitch
            @endif
        @else
            {{ $value }}
        @endif
    </div>
</div>
