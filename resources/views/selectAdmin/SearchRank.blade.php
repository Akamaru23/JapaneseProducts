@extends('admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/admin/SearchRank.css') }}">
@endsection

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

    <h1>{{ $Prefecture }}</h1>

    @for($i=1; $i<4; $i++)
        @php $found = false; @endphp

        @for($j = 0; $j < count($data); $j++)
            @if(isset($data[$j]) && $data[$j]->rank == $i)
                @php $found = true; @endphp
                <h1 class="line-content">No.{{ $i }},</h1>
                <h1 class="line-content">{{ $data[$j]->products_name }}</h1>
                <form class="change-form" action="{{ route('changeRank', ['id' => $i])}}"  method="POST">
                    @csrf
                    <img src="{{ asset( '/storage/' . $data[$j]->products_img ) }}" onerror="this.error=null; this.src='{{ $data[$j]->products_img }}'" alt="">
                    <input type="hidden" name="SearchPrefecture" value="{{ $data[$j]->Prefecture }}">
                    <input type="hidden" name="Search_id" value="{{ $data[$j]->id }}">
                    <button type="submit">更新</button>
                </form>
            @endif
        @endfor

        @if(!$found)
            <h1 class="line-content">No.{{ $i }},</h1>
            <h1 class="line-content">No any data</h1>
            <form class="change-form" action="{{ route('changeRank', ['id' => $i])}}"  method="POST">
                @csrf
                <img src="{{ asset('img/sample.webp') }}" alt="">
                <input type="hidden" name="SearchPrefecture" value="{{ $Prefecture }}">
                <button type="submit">更新</button>
            </form>
        @endif

    @endfor

@endsection