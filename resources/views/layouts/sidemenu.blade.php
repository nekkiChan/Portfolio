<div id="sidemenu_trigger_field" class="sidemenu_trigger_field">
    <img class="icon" src="{{ asset('storage/assets/img/gray/bar.svg') }}" alt="SideMenu" />
</div>

@php
    // 認証済み
    if (Auth::check()) {
        $transition_contents_data = config('screens.transition.auth');
        $login_user = session('login_user');
    }
    // ゲスト
    else {
        $transition_contents_data = config('screens.transition.guest');
    }
@endphp

<div id="sidemenu_field" class="sidemenu_field">
    @isset($transition_contents_data)
        @foreach ($transition_contents_data as $transition_content_data)
            @if (Auth::check())
                @continue($transition_content_data['level'] > $login_user->level)
            @endif
            <div class="sidemenu_row">
                <a href="{{ route($transition_content_data['routepath']) }}" class="row">
                    {{ $transition_content_data['view'] }}
                </a>
            </div>
        @endforeach
    @endisset
</div>
