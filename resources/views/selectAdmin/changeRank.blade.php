@extends('admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/admin/changeRank.css') }}">
@endsection

@section('content')

    @if(is_null($Rank_data))

        <h1>No.{{ $Rank }}</h1>
        <h1>Sample</h1>
        <img class="image_No" src="{{ asset('img/sample.webp') }}" alt="">

        <div class="space50px"></div>

        <form action="{{ route('showSearchProducts') }}" method="GET">
            @csrf
            <label for="SearchProducts_names">從禮物名來查詢</label>
            <div class="search">
                <input type="text" id="SearchProducts_names" name="SearchProducts_names">
                <button class="searchButton" type="submit">查詢</button>
            </div>
        </form>

    @else

        <h1>No.{{ $Rank }}</h1>
        <h1>{{ $Rank_data->products_name }}</h1>
        <img class="image_No" src="{{ asset( '/storage/' . $Rank_data->products_img ) }}" onerror="this.onerror=null; this.src='{{ $Rank_data->products_img }}'" alt="you didnt set img">
        
        <div class="space50px"></div>

        <form action="{{ route('showSearchProducts') }}" method="GET">
            @csrf
            <label for="SearchProducts_names">從禮物名來查詢</label>
            <div class="search">
                <input type="text" id="SearchProducts_names" name="SearchProducts_names">
                <input type="hidden" name="Search_id" value="{{ $Rank_data->id }}">
                <button class="searchButton" type="submit">查詢</button>
            </div>
        </form>    
        
    @endif

    @if(isset($data))

        @foreach($data as $data)

            <div class="space100px"></div>

            <div class="content">
                <h2>{{ $data->products_names }}</h2>
                <img class="image" src="{{ asset( '/storage/' . $data->products_img ) }}" onerror="this.onerror=null; this.src='{{ $data->products_img }}'" alt="">
                
                <form action="{{ route('updateRank', [ $data->id ]) }}" method="POST">
                    @csrf
                    <button class="updateButton" type="submit">換禮物</button>
                </form>
            </div>

        @endforeach
        
    @else
        <h1 class="error">沒有查詢結果</h1>
    @endif

@endsection