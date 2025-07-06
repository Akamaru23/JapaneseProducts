@extends('layout')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/ProductsInfo.css') }}">
@endsection

@section('content')
<div class="Info">
    <h1 class="info-title">{{ $data->products_names }}</h1>
    <div class="info-img-wrap">
        <img class="info-img" src="{{ asset('/storage/' . $data->products_img) }}" onerror="this.onerror=null; this.src='{{ $data->products_img }}'" alt="">
    </div>
    <div class="info-detail">
        <h2 class="info-desc">{{ $data->description }}</h2>
        <h2 class="info-link">
            <a href="{{ $data->url }}" target="_blank" rel="noopener noreferrer">{{ $data->url }}</a>
        </h2>
    </div>
</div>
@endsection