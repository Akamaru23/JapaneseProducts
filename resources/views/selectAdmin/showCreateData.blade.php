@extends('admin')

@section('style') 
<link rel="stylesheet" href="{{ asset('/css/admin/create.css') }}">
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if($errors->has('Prefecture'))
        <h3 class="error">請你選一個縣市</h3>
        <h3 class="error">{{ $errors->first('Prefecture') }}</h3>
        <br>
    @endif

    @if($errors->has('description'))
        <h3 class="error">有空白的欄位</h3>
        <h3 class="error">{{ $errors->first('description') }}</h3>
        <br>
    @endif
    
    @if($errors->has('ProductImg'))
        <h3 class="error">沒有上傳圖片</h3>
        <h3 class="error">{{ $errors->first('ProductImg') }}</h3>
        <br>
    @endif
    
    @if($errors->has('ProductName'))
        <h3 class="error">有空白的欄位</h3>
        <h3 class="error">{{ $errors->first('ProductName') }}</h3>
        <br>
    @endif
    
    @if($errors->has('url'))
        <h3 class="error">有空白的欄位</h3>
        <h3 class="error">{{ $errors->first('url') }}</h3>
        <br>
    @endif


<div class="Create">

    <form action="{{ route('Img') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="CreateColm">
            <h3>商品名 : </h3><input type="text" name="ProductName">
        </div>
        
        <br>
        
        <div class="Createform">
            <h3>県名 : </h3>
            <select name="Prefecture">
                <option value="">請你選擇一個縣市</option>
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
            </select>
        </div>

        <br>
        
        <div class="Createform">
            <h3>説明 : </h3>    <textarea name="description"></textarea>
        </div>

        <br><div class="Createform">
            <h3>官方網站URL : </h3><input type="text" name="url">
        </div>

        <br>
        
        <div class="CreateImg">
            <label>
                <input type="radio" name="image_or_url" value="image" checked onclick="toggleInput('image')"> 上傳圖片
            </label>
            <label>
                <input type="radio" name="image_or_url" value="url" onclick="toggleInput('url')"> 輸入URL
            </label>

            <div id="imageInputContainer" class="Create_url_or_Img">
                <input type="file" id="imageInput" name="ProductImg">
                <br>

                <img class="Detail_Database_imageURL" id="preview" src="#" alt="画像プレビュー" style="display:none;">
                
                <br>
                <button type="button" id="cancelButton" style="display: none;">取消</button>
            </div>

            <div id="urlInputContainer" class="Createform" style="display: none;">
                <h3>圖片URL : </h3><input type="text" id="UrlInput" name="ProductImgUrl">
                
                <img class="Detail_Database_imageURL" id="preview_url" src="#" alt="画像プレビュー" style="display:none;">
                
            </div>
            
        </div>

        <br><br>
        <button type="submit">上傳</button>

    </form>

</div>

    
@endsection

@section('script')
    <script src="{{ asset('/js/admin/showImg.js') }}"></script>
@endsection