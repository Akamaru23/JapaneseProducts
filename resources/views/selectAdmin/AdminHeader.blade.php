<div class="header">
    @if(Request::is('2bVtbHzQ/admin/database'))
        <h1>データベース管理</h1>
    @elseif(Request::is('2bVtbHzQ/admin/uploadImages'))
        <h1>データ追加</h1>
    @elseif(Request::is('2bVtbHzQ/admin/comments'))
        <h1>メッセージ確認</h1>
    @elseif(Request::is('2bVtbHzQ/admin/top3rank'))
        <h1>更新Top3</h1>
    @elseif(Request::is('2bVtbHzQ/admin/rank'))
        <h1>更新各縣Top3</h1>
    @else
        <h1>管理画面</h1>
        <nav>
            <ul>
                <li><a href="{{ route('adminDatabase') }}">データ検索</a></li>
                <li><a href="{{ route('showImg') }}">データ追加</a></li>
                <li><a href="{{ route('showComments') }}">メッセージ確認</a></li>
            </ul>
        </nav>
    @endif
</div>