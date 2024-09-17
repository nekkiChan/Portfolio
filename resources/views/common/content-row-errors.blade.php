@if (!empty(session('validate_success')))
    <div class="content_header">
        @if (session('validate_success') == true)
            <div class="content_row validate success flex items-center justify-left">
                {{ '更新に成功しました。' }}
            </div>
        @else
            @foreach (session('validate_success') as $message)
                <div class="content_row validate success flex items-center justify-left">
                    {{ $message }}
                </div>
            @endforeach
        @endif
    </div>
    <div class="content_space">
    </div>
@endif

@if (count($errors) > 0)
    <div class="content_header">
        @foreach ($errors->all() as $message)
            <div class="content_row validate error flex items-center justify-left">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="content_space">
    </div>
@endif
