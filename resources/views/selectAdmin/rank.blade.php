@extends('admin')

@section('content')
<div class="Search">
    <h1>查詢資料</h1>
    <form action="{{ route('searchRank') }}">
    @csrf
    <label for="SearchPrefecture"></label>

        <div class="content">
            <select class="searchForm" id="SearchPrefecture" name="SearchPrefecture">
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

            <button class="searchButton" type="submit">検索</button>
        </div>
    </form>
</div>


@endsection