@extends('admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/admin/DetailDatabase.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin/SearchForm.css') }}">
@endsection

@section('content')
<div class="Search">
    <h1>查詢資料</h1>
    <form method="POST" action="{{ route('search') }}">
        @csrf
        
        <div class="Searchform">
            <label for="SearchPrefecture">縣名 : </label>
            <select id="SearchPrefecture" name="SearchPrefecture">
                <option value="">選択してください</option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="宮城県">宮城県</option>
                <option value="秋田県">秋田県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="東京都">東京都</option>
                <option value="大阪府">大阪府</option>
                <option value="沖縄県">沖縄県</option>
            </select>
        </div>
        
        <div class="Searchform">
            <label for="SearchProducts_names">商品名 : </label>
            <input id="SearchProducts_names" name="SearchProducts_names" type="text">
        </div>
        <button type="submit">検索</button>
    </form>
</div>

    @if(isset($jpProducts))
        <ul>
            @forelse($jpProducts as $jpP)
                <form method="POST" action="{{ route('delete', $jpP->id) }}">
                    <h3>検索結果：</h3>
                    <li><a href="/2bVtbHzQ/admin/database/{{ $jpP->id }}">{{ $jpP->products_names }}（県名: {{ $jpP->Prefecture }}）</a></li>
                    @csrf
                    <button  type="submit" onclick=>削除</button>
                </form>
            @empty
                <li>該当するユーザーはいません</li>
            @endforelse
        </ul>
    @endif

                
@endsection