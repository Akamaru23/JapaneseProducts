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

    @for($i = 1; $i < 4; $i++)
        @php $found = false; @endphp

        @if(is_null($data) || count($data) === 0)
            <h1>{{ $i }}</h1>
            <h1>No any data</h1>
            <form action="{{ route('changeRank', ['id' => $i]) }}" method="POST">
                @csrf
                <input type="hidden" name="SearchPrefecture" value="{{ $Prefecture }}">
                <button type="submit">更新</button>
            </form>
        @else
            @for($j = 0; $j < count($data); $j++)
                @if(isset($data[$j]) && $data[$j]->rank == $i)
                    @php $found = true; @endphp
                    <h1>{{ $data[$j]->rank }}</h1>
                    <h1>{{ $data[$j]->products_name }}</h1>
                    <img src="{{ asset( '/storage/' . $data[$j]->products_img ) }}" onerror="this.error=null; this.src='{{ $data[$j]->products_img }}'" alt="">
                    <form action="{{ route('changeRank', $data[$j]->id)}}"  method="POST">
                        @csrf
                        <button type="submit">更新</button>
                    </form>
                @endif
            @endfor

            @if(!$found)
                <h1>{{ $i }}</h1>
                <h1>No any data</h1>
                <form action="{{ route('changeRank', ['id' => $i])}}"  method="POST">
                    @csrf
                    <input type="hidden" name="SearchPrefecture" value="{{ $Prefecture }}">
                    <button type="submit">更新</button>
                </form>
            @endif
        @endif
    @endfor
@endsection