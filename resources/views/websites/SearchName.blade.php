<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/searchName.css') }}">
    <title></title>
</head>
<body>
    
    <div class='header'>
        <div class='title'>日本の禮物
            <img src="{{ asset('/img/japaneseFlag-fixed.png') }}" alt="">
        </div>
    </div>
    <div class="contents">
        @foreach($data as $data)
        <div class="products">
            <a href="/Search/{{ $data->id }}"><h1>{{ $data->products_names }}</h1></a>
            <h1>{{ $data->Prefecture }}</h1>
            <img src="{{ asset('storage/uploads/' . $data->products_img) }}" onerror="this.onerror=null; this.src='{{ $data->products_img }}'" alt="">
        </div>
        @endforeach
    </div>
    
    @include('footer')
</body>
</html>