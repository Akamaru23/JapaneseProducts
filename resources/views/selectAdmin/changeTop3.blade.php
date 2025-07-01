@extends('admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/admin/changeTop3Rank.css') }}">
@endsection

@section('content')

    <h1 id="line_txet">No. {{ $no }}</h1>

    @if(is_null($no_data))
        <form action="{{ route('showSearchTop3', [$no, 0]) }}" method="POST">
            @csrf
            <label for="SearchProducts_names">從禮物名來查詢</label>
            <div class="search">
                <input type="text" id="SearchProducts_names" name="SearchProducts_names">
                <button class="searchButton" type="submit">查詢</button>
            </div>
        </form>
    @else
        <h1 id="line_txet">{{ $no_data->products_names }}</h1>
        <img class="image_No" src="{{ asset('/storage/' . $no_data->products_img) }}" onerror="this.onerror=null; this.src='{{ $no_data->products_img }}'" alt="">

        <div class="space50px"></div>

        <form action="{{ route('showSearchTop3', [$no, $no_data->id]) }}" method="POST">
            @csrf
            <label for="SearchProducts_names">從禮物名來查詢</label>
            <div class="search">
                <input type="text" id="SearchProducts_names" name="SearchProducts_names">
                <button class="searchButton" type="submit">查詢</button>
            </div>
        </form>
    @endif

    @forelse($data as $data)
        <div class="space100px"></div>

        <div class="content">
            <h1>{{ $data->products_names }}</h1>
            <img class="image" src="{{ '/storage/' . $data->products_img }}" onerror="this.onerror=null; this.src='{{ $data->products_img }}'" alt="">
            
            <form action="{{ route('updateTop3', ['rank' => $no] ) }}" method="POST">
                @csrf
                <input type="hidden" name="products_id" value="{{ $data->id }}">
                <button class="updateButton" type="submit">換禮物</button>
            </form>
        </div>

    @empty

        <h1 class="error">沒有查詢結果</h1>

    @endforelse


@endsection