@extends('layout')

@section('title', '日本の禮物')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@endsection

@section('content')

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<div class="block" id="1">{{ $data[0]->Prefecture }}的熱賣Top3</div>

<div class="swiper onceSwiper">
    <div class="swiper-wrapper">
        @foreach($jpProducts->sortBy('rank') as $JpP)
            <div class="swiper-slide">
                <img src="{{ asset('storage/uploads/' . $JpP->products_img) }}" onerror="this.onerror=null; this.src='{{ $JpP->products_img }}'" alt="">
            </div>
        @endforeach
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

    @foreach($data as $data)
        <a href="/Search/{{ $data->id }}"><h2>{{ $data->products_names }}</h2></a>
        <a href="{{ $data->url }}"><h2>{{ $data->url }}</h2></a>
        <img class="dataImg" src="{{ asset('storage/uploads/' .$data->products_img) }}" onerror="this.onerror=null; this.src='{{ $data->products_img }}'" alt="">
        <br>
    @endforeach


<div class="space200"></div>

       



@endsection
