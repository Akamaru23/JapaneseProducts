<div class="header">
    @if(Request::is('2bVtbHzQ/admin/database*'))
        <h1>資料庫管理</h1>
    @elseif(Request::is('2bVtbHzQ/admin/uploadImages*'))
        <h1>新增資料</h1>
    @elseif(Request::is('2bVtbHzQ/admin/comments*'))
        <h1>確認訊息</h1>
    @elseif(Request::is('2bVtbHzQ/admin/top3rank*'))
        <h1>更新Top3</h1>
    @elseif(Request::is('2bVtbHzQ/admin/rank*'))
        <h1>更新各縣Top3</h1>
    @endif
</div>