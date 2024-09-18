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

                        @case('file')
                            <input type="hidden" class="{{ $name }}_flag flag" name="{{ "{$name}_flag[{$index}]" }}"
                                value="{{ $value }}">
                            <input type="{{ $type }}" class="{{ $name }} file"
                                name="{{ "{$name}[{$index}]" }}">
                            @empty($value)
                                <div class="file close hidden">
                                    <img src="{{ asset('storage/assets/img/gray/close.svg') }}" alt="close">
                                </div>
                            @else
                                <div class="file image">
                                    <img src="{{ asset('storage/assets/img/gray/image.svg') }}" alt="image">
                                </div>
                                <div class="file delete">
                                    <img src="{{ asset('storage/assets/img/gray/delete.svg') }}" alt="delete">
                                </div>
                            @endempty
                        @break

                        @case('password')
                            <input type="{{ $type }}" class="{{ $name }}" name="{{ "{$name}[{$index}]" }}"
                                value="{{ $value }}" placeholder="{{ $placeholder }}">
                        @break

                        @case('ckeditor')
                            <textarea class="ckeditor {{ $name }}" name="{{ "{$name}[{$index}]" }}">
                            {{ $value }}
                        </textarea>
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

                        @case('ckeditor')
                            <textarea class="ckeditor {{ $name }}" name="{{ "{$name}" }}">
                            {{ $value }}
                        </textarea>
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

                    @case('ckeditor')
                        <textarea class="ckeditor {{ $name }}" name="content">
                            {{ $value }}
                        </textarea>
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
