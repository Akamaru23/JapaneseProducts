@extends('admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/admin/top3rank.css') }}">
@endsection

@section('content')

    @for($i=0; $i<3; $i+=1)
        @if(isset($data[$i]))
            <div class="context">
                <div class="half-content">
                    <h1 id="line-text">No. {{$i+1}}</h1>
                    <h1 class="title" id="line-text">{{ $data[$i]->products_names }}</h1>
                </div>
                <div class="img-content">
                    <img class="image"
                            src="{{ '/storage/' . $data[$i]->products_img }}"
                            onerror="this.onerror=null; this.src='{{ $data[$i]->products_img }}';"
                            alt="">

                    <form action="{{ route('showUpdateTop3') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data[$i]->id }}">
                        <input type="hidden" name="no" value="{{ $i+1 }}">
                        <button class="update" type="submit">更新這個禮物</button>
                    </form>
                </div>
            </div>
        @else
            <div class="context">
                <div class="half-content">
                    <h1>No. {{$i+1}}</h1>
                    <h1 class="title">沒有這個禮物</h1>
                </div>
                <div class="img-content">
                    <img class="image" src="{{ asset('img/sample.webp') }}" alt="">
                </div>

                <form action="{{ route('showUpdateTop3') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="no" value="{{ $i+1 }}">
                    <button class="update" type="submit">更新這個禮物</button>
                </form>
            </div>
        @endif
    @endfor


@endsection