@extends('admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/admin/changeRank.css') }}">
@endsection

@section('content')
    <h1>{{ $no_data->products_name }}</h1>
    <img src="{{ asset('storage/uploads/' . $no_data->products_img) }}" onerror="this.onerror=null; this.src='{{ $no_data->products_img }}'" alt="you didnt set img">

    <div class="space50px"></div>

    <form action="{{ route('showSearchProducts', $no_data->id) }}" method="POST">
        @csrf
        <label for="SearchProducts_names">從禮物名來查詢</label>
        <input type="text" id="SearchProducts_names" name="SearchProducts_names" > 
        <button type="submit">查詢</button>
    </form>

    @foreach($data as $data)

    <div class="space100px"></div>

    <div class="content">
        <h2>{{ $data->products_names }}</h2>
        <img class="image" src="{{ asset('storage/uploads/' . $data->products_img) }}" onerror="this.onerror=null; this.src='{{ $data->products_img }}'" alt="">
        
        <form action="{{ route('updateRank', [$data->id, $no_data->id] ) }}" method="POST">
            @csrf
            <button class="updateButton" type="submit">換禮物</button>
        </form>
    </div>


    @endforeach
@endsection