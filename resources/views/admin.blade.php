<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者頁面 - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/admin/header.css') }}"> 
    <link rel="stylesheet" href="{{ asset('/css/admin/sideBar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin/MainView.css') }}">

    @yield('style')
</head>
<body>
    

    <div class="sideBar">
            <div id="selector">
                <h1 class="point" onclick="location.href='{{ route('adminDatabase') }}'">查詢資料</h1>
            </div>


            <div id="selector">
                <h1 class="point" onclick="location.href='{{ route('showImg') }}'">新增資料</h1>
            </div>

            
            <div id="selector">
                <h1 class="point" onclick="location.href='{{ route('showComments') }}'">確認訊息</h1>
            </div>

            
            <div id="selector">
                <h1 class="point" onclick="location.href='{{ route('top3rank') }}'">更新Top3</h1>
            </div>

            
            <div id="selector">
                <h1 class="point" onclick="location.href='{{ route('rank') }}'">更新各縣Top3</h1>
            </div>

    </div>

    <div class="main">
        @include('selectAdmin.AdminHeader')
        @yield('content')
    </div>


    <script src="{{ asset('/js/admin/sideBar.js') }}"></script>
    @yield('script')
</body>
</html>