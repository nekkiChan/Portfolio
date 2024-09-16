@if (count($errors) > 0)
    <div class="content_header">
        @foreach ($errors->all() as $message)
            <div class="content_row flex items-center justify-left">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="content_space">
    </div>
@endif
