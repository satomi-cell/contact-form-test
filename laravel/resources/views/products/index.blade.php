@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')

<div class="header-area">
   <h1>商品一覧</h1>

   <a href="{{ route('products.create') }}" class="add-btn">
        + 商品を追加
   </a>
</div>

<form method="GET" action="/products/search">
    <input type="text" name="keyword" placeholder="商品名で検索">
    
    <label for="modal-toggle" class="open-btn">
    {{ request('sort') == 'high' ? '高い順に表示' : (request('sort') == 'low' ? '低い順に表示' : '価格で並び替え') }}
    </label>
    <input type="checkbox" id="modal-toggle" hidden>

    <button type="submit">検索</button>

 <div class="modal">
    <div class="modal-content">

        <!-- 閉じる -->
        <label for="modal-toggle" class="close">&times;</label>

        <h3>並び替え</h3>

        <div>
            <label>
                <input type="radio" name="sort" value="high"
                {{ request('sort') == 'high' ? 'checked' : '' }}>
                高い順に表示
            </label>
        </div>

        <div>
            <label>
                <input type="radio" name="sort" value="low"
                {{ request('sort') == 'low' ? 'checked' : '' }}>
                低い順に表示
            </label>
        </div>

   <br>
    <!-- 適用ボタン風 -->
     <label for="modal-toggle" class="apply-btn">適用して閉じる</label>

   <br><br>

    <!-- リセット -->
     <a href="/products/search" class="reset-btn">× リセット</a>
   </div>
 </div>
</form>

<div class="products">
     @foreach ($products as $product)

        <a href="/products/{{ $product->id }}" class="product-card">
           
           <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">

           <h3>{{ $product->name }}</h3>

           <p>¥{{ $product->price }}</p>

        </a>

     @endforeach

</div>

<div>
   {{ $products->appends(request()->query())->links() }}
</div>

@endsection