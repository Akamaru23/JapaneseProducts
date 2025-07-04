@extends('layout')

@section('title', '日本の禮物')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{ asset('/css/search.css') }}">
@endsection

@section('content')

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<h1 class="block" id="1">{{ $data[0]->Prefecture }}的熱賣Top3</h1>

<div class="swiper onceSwiper">
    <div class="swiper-wrapper">
        @for($i=0; $i<3; $i++)
            @for($j=1; $j<4; $j++)
                @if($jpProducts[$i]->rank == $j)
                    <div class="swiper-slide">
                        <img src="{{ asset( '/storage/' . $jpProducts[$i]->products_img) }}" onerror="this.onerror=null; this.src='{{ $jpProducts[$i]->products_img }}'" alt="">
                    </div>
                @endif
            @endfor
        @endfor
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

    @for($i=0; $i<3; $i++)
        @for($j=1; $j<4; $j++)
            @if($jpProducts[$i]->rank == $j)
                <div class="Souvenir">
                    <div class="SouvenirInfo">
                        <h2>No.@php echo $j @endphp 商品</h2>
                        <a href="{{ route('info', [ 'id' => $jpProducts[$i]->id]) }}"><h3>{{ $jpProducts[$i]->products_name }}</h3></a>
                        <h2>官方網站</h2>
                        <a href="{{ $jpProducts[$i]->url }}"><h3>{{ $jpProducts[$i]->url }}</h3></a>
                    </div>
                    <img src="{{ asset( '/storage/' .$jpProducts[$i]->products_img) }}" onerror="this.onerror=null; this.src='{{ $jpProducts[$i]->products_img }}'" alt="test">
                    <br>
                </div>
            @endif
        @endfor
    @endfor


<div class="space200"></div>

       



@endsection
