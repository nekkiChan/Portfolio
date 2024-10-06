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

@if (!isset($initSelectValue))
    @php
        $initSelectValue = ' - ';
    @endphp
@endif

<div class="input_field">
    <div class="text_field">
        @if (isset($type))
            @php
                // name属性あり
            @endphp
            @if (isset($index))
                @if ($index != 'once')
                    @php
                        $nameval = "{$name}[{$index}]";
                        $nameflagval = "{$name}_flag[{$index}]";
                    @endphp
                @else
                    @php
                        $nameval = "{$name}";
                        $nameflagval = "{$name}_flag";
                    @endphp
                @endif

                @switch($type)
                    @case('text')
                        <input type="{{ $type }}" class="{{ $name }}" name="{{ $nameval }}"
                            value="{{ $value }}" placeholder="{{ $placeholder }}">
                    @break

                    @case('number')
                        <input type="{{ $type }}" class="{{ $name }}" name="{{ $nameval }}"
                            value="{{ $value }}" placeholder="{{ $placeholder }}">
                    @break

                    @case('email')
                        <input type="{{ $type }}" class="{{ $name }}" name="{{ $nameval }}"
                            value="{{ $value }}" placeholder="{{ $placeholder }}">
                    @break

                    @case('file')
                        <input type="hidden" class="{{ $name }}_flag flag" name="{{ $nameflagval }}"
                            value="{{ $value }}">
                        <input type="{{ $type }}" class="{{ $name }} file" name="{{ $nameval }}">
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
                        <input type="{{ $type }}" class="{{ $name }}" name="{{ $nameval }}"
                            value="" placeholder="{{ $placeholder }}">
                    @break

                    @case('ckeditor')
                        <textarea class="ckeditor {{ $name }}" name="{{ $nameval }}">
                    {{ $value }}
                </textarea>
                    @break

                    @case('select')
                        @isset($selectdata)
                            <select class="{{ $name }}" name="{{ "{$name}[{$index}]" }}">
                                @if (empty($value))
                                    <option value="" class="empty" selected>
                                        {{ $initSelectValue }}
                                    </option>
                                @endif
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
                @php
                    // name属性なし
                @endphp
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
                                @if (empty($value))
                                    <option value="" class="empty" selected>
                                        {{ $initSelectValue }}
                                    </option>
                                @endif
                                @foreach ($selectdata as $key => $option)
                                    <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                        @endisset
                    @break

                    @case('dom')
                        <div class="dom_field">
                            {!! $value !!}
                        </div>
                    @break
                @endswitch
            @endif
        @else
            {{ $value }}
        @endif
    </div>
</div>
