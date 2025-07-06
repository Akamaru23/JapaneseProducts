@extends('layout')

@section('style')
<link rel="stylesheet" href="{{ asset('css/searchName.css') }}">
@endsection

@section('content')
    <div class="contents">
        @foreach($data as $data)
        <div class="products-card" onclick="ScreenTransition('/SearchName/{{ $data->id }}')">
            <a href="/SearchName/{{ $data->id }}" class="product-link">
                <h1 class="product-title">{{ $data->products_names }}</h1>
            </a>
            <h2 class="product-prefecture">{{ $data->Prefecture }}</h2>
            <div class="product-img-wrap">
                <img class="product-img" src="{{ asset('/storage/' . $data->products_img) }}" onerror="this.onerror=null; this.src='{{ $data->products_img }}'" alt="">
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('script')
<script src="{{ asset('/js/searchName.js') }}"></script>
@endsection