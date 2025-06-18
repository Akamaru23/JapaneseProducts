@extends('layout')

@section('title', '日本の禮物')


@section('location1', '各縣的推薦')
@section('location2', '各縣的推薦 仔細')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@endsection

@section('content')

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<div class="block" id="1">各縣的推薦</div>

<div class="swiper onceSwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <a href="#1"><img src="{{ asset('uploads/' . $data[0]->products_img) }}" onerror="this.onerror=null; this.src='{{ $data[0]->products_img }}'" alt=""></a>
        </div>
        <div class="swiper-slide">
            <a href="#2"><img src="{{ asset('uploads/' . $data[1]->products_img) }}" onerror="this.onerror=null; this.src='{{ $data[1]->products_img }}'" alt=""></a>
        </div>
        <div class="swiper-slide">
            <a href="#3"><img src="{{ asset('uploads/' . $data[2]->products_img) }}" onerror="this.onerror=null; this.src='{{ $data[2]->products_img }}'" alt=""></a>
        </div>
    </div>
    
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
        

<div class="space200"></div>

       
<div class="block2">各縣的推薦</div>
<div class="exampleSouvenir">
    
    <div class="SouvenirContent" id="1">
        <div class="comment">
            <h1>{{ $data[0]->products_names }}</h1>
            <br>
            <h3>{{ $data[0]->description }}</h3>
        </div>
    </div>
    
    <div class="SouvenirImg">
        <img src="{{ asset('storage/uploads/' . $data[0]->products_img) }}" onerror="this.onerror=null; this.src='{{ $data[0]->products_img }}'" alt="">
    </div>

</div>

<div class="exampleSouvenir">


    <div class="SouvenirImg"  id="2">
        <img src="{{ asset('storage/uploads/' . $data[1]->products_img) }}" onerror="this.onerror=null; this.src='{{ $data[1]->products_img }}'" alt="">
    </div>
    
    <div class="SouvenirContent">
        <div class="comment">
            <h1>{{ $data[1]->products_names }}</h1>
            <br>
            <h3>{{ $data[1]->description }}</h3>
        </div>
    </div>
    

</div>

<div class="exampleSouvenir">
    
    <div class="SouvenirContent" id="3">
        <div class="comment">
            <h1>{{ $data[2]->products_names }}</h1>
            <br>
            <h3>{{ $data[2]->description }}</h3>
        </div>
    </div>
    
    <div class="SouvenirImg">
        <img src="{{ asset('storage/uploads/' . $data[2]->products_img) }}" onerror="this.onerror=null; this.src='{{ $data[2]->products_img }}'" alt="">
    </div>

</div>



@endsection
