<div class="card sidebar">
    <div class="card-header">MENU</div>

    <div class="card-body">
        <div class="panel panel-default">
            <ul class="nav nav-pills nav-stacked" style="display:block;">
                <li><a href="{{ route('home') }}">ホーム</a></li>

                <div class="mt-3">
                    実績
                    <li><a href="{{ route('work.create') }}">実績登録画面</a></li>
                </div>

                <div class="mt-3">
                    お知らせ
                    <li><a href="{{ route('information.create') }}">お知らせ登録画面</a></li>
                </div>

                <div class="mt-3">
                    管理者情報
                    <li><a href="{{ route('administrators.edit') }}">管理者情報編集画面</a></li>
                </div>
            </ul>
        </div>
    </div>
</div>
