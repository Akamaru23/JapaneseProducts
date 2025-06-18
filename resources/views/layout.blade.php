<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JapaneseProduct - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/search.css') }}">
    <style>
    </style>

    @yield('style')
</head>
<body>
    @include('header')

    
    @yield('content')

    <div class="space"></div>

    <form class="Prefecture" id="prefectureForm" method="POST" action="{{ route('FromPrefecture') }}">
    <h1>縣市來查詢</h1>
    @csrf
        <label for="SearchPrefecture"></label>

        <div class="content">
            <select class="searchForm" id="SearchPrefecture" name="SearchPrefecture">
                <option value="">選択してください</option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="宮城県">宮城県</option>
                <option value="秋田県">秋田県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="東京都">東京都</option>
                <option value="大阪府">大阪府</option>
                <option value="沖縄県">沖縄県</option>
            </select><br>

            <button class="searchButton" type="submit">検索</button>
        </div>
    </form>

    <div class="space"></div>

    <form class="NameForm" id="ProductsNameForm" method="POST" action="{{ route('FromName') }}">
    <h1>商品名來查詢</h1>
        @csrf
        <label for="SearchProducts_names"></label>
        <div class="content">
            <input class="searchForm" id="SearchProducts_names" name="SearchProducts_names" type="text"><br>

            <button class="searchButton" type="submit">検索</button>
        </div>
    </form>



<div class="comments">
    <h1 id="4"><br>如果有甚麼建議就寄給我</h1>
    <form method="POST" action="{{ route('comments') }}" onsubmit="return confirm('本当に送信しますか？');">
        @csrf
        <h3>件名<input type="text" name="title"></h3>
        <textarea class="inputText" name="Comment" rows="4">{{ old('Comment') }}</textarea>
        <br>
        @if($errors->has('title')||$errors->has('Comment'))
            <h3>有空白的欄位就不能送出</h3>
            <br>
        @endif
        <button type="submit">送出</button>   
    </form>
</div>


    @include('footer')


    <script>
        var swiper = new Swiper(".onceSwiper", {
            spaceBetween: 30,
            slidesPerView: 1,
            freeMode: true,
            loop: true,
            watchSlidesProgress: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

    </script>
</body>
</html>