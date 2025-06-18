@extends('admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/admin/top3rank.css') }}">
@endsection

@section('content')
    @for($i=0; $i<count($data); $i+=1)
        <div class="context">
            <h1>No. {{$i+1}}</h1>
            <h1 class="title">{{ $data[$i]->products_names }}</h1>
            <img class="image" src="{{ asset('storage/uploads/' . $data[$i]->products_img) }}" onerror="this.onerror=null; this.src='{{ $data[$i]->products_img }}'" alt="">

            <form action="{{ route('showUpdateTop3') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data[$i]->id }}">
                <input type="hidden" name="no" value="{{ $i+1 }}">
                <button class="update" type="submit">更新這個禮物</button>
            </form>
        </div>
    @endfor
@endsection