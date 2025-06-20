@extends('admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/admin/DetailDatabase.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin/SearchForm.css') }}">
@endsection

@section('content')
<div class="Search">
    <h1>查詢資料</h1>
    <form method="POST" action="{{ route('search') }}">
    @csrf
    <div class="Searchform">
        <label for="SearchPrefecture">県名 : </label>
        <select id="SearchPrefecture" name="SearchPrefecture">
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
        </select>
    </div>

    <div class="Searchform">
        <label for="SearchProducts_names">商品名 : </label>
        <input id="SearchProducts_names" name="SearchProducts_names" type="text">
    </div>

        <button type="submit">検索</button>
    </form>

</div>

    @if(isset($jpProducts))
        <h3>検索結果：</h3>
        <ul>
            @forelse($jpProducts as $jpP)
                <li><a href="/2bVtbHzQ/admin/database/{{ $jpP->d }}">{{ $jpP->roducts_names }}（県名: {{ $jpP->refecture }}）</a></li>
            @empty
                <li>該当するユーザーはいません</li>
            @endforelse
        </ul>
    @endif
    
    <form method="POST" action="{{ route('update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $products->id }}">
        
        <label for="ProductName">商品名</label>
        <input id="ProductName" name="ProductName" value="{{ $products->products_names }}" type="text">
        @if($errors->has('ProductName'))
            <h3>{{ $errors->first('ProductName') }}</h3>
        @endif
        
        <br>

        <label for="ProductImg">イメージURL</label>
        <input id="ProductImg" name="ProductImg" value="{{ $products->products_img }}" type="text">
        <img class="Detail_Database_imageURL" src="{{ asset('storage/uploads/' . $products->products_img) }}" onerror="this.onerror=null; this.src='{{ $products->products_img }}'" alt="">
        @if($errors->has('ProductImg'))
            <h3>{{ $errors->first('ProductImg') }}</h3>
        @endif
        
        <br>


        <label for="Prefecture">県名</label>
        <select id="Prefecture" name="Prefecture" >
            <option value="">選択してください</option>
            <option value="北海道" {{ $products->Prefecture == '北海道' ? 'selected' : '' }}>北海道</option>
            <option value="青森県" {{ $products->Prefecture == '青森県' ? 'selected' : '' }}>青森県</option>
            <option value="岩手県" {{ $products->Prefecture == '岩手県' ? 'selected' : '' }}>岩手県</option>
            <option value="宮城県" {{ $products->Prefecture == '宮城県' ? 'selected' : '' }}>宮城県</option>
            <option value="秋田県" {{ $products->Prefecture == '秋田県' ? 'selected' : '' }}>秋田県</option>
            <option value="山形県" {{ $products->Prefecture == '山形県' ? 'selected' : '' }}>山形県</option>
            <option value="福島県" {{ $products->Prefecture == '福島県' ? 'selected' : '' }}>福島県</option>
            <option value="東京都" {{ $products->Prefecture == '東京都' ? 'selected' : '' }}>東京都</option>
            <option value="大阪府" {{ $products->Prefecture == '大阪府' ? 'selected' : '' }}>大阪府</option>
            <option value="沖縄県" {{ $products->Prefecture == '沖縄県' ? 'selected' : '' }}>沖縄県</option>
        </select><br>
        @if($errors->has('Prefecture'))
            <h3>{{ $errors->first('Prefecture') }}</h3>
        @endif
        
        <br>

        <label for="description">説明</label>
        <textarea id="description" name="description" rows="4">{{ $products->description }}</textarea>
        @if($errors->has('description'))
            <h3>{{ $errors->first('description') }}</h3>
        @endif

        <br>

        <label for="url">URL</label>
        <input name="url" type="text" value="{{ $products->url }}">
        @if($errors->has('url'))
            <h3>{{ $errors->first('url') }}</h3>
        @endif

        <br>

        <button type="submit">更新する</button>
    </form>
@endsection