@extends('layout')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/ProductsInfo.css') }}">
@endsection

@section('content')
    <h1>{{ $data->products_names }}</h1>
    <img src="{{ asset('storage/uploads/' . $data->products_img) }}" onerror="this.onerror=null; this.src='{{ $data->products_img }}'" alt="">
    <h2>{{ $data->description }}</h2>
    <h2>{{ $data->SalesArea }}</h2>
    <h2>{{ $data->url }}</h2>
@endsection