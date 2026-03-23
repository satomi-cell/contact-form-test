@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
 
<div class="detail-container">
   <h1 class="detail-title">商品詳細</h1>
    <div class="breadcrumb">
      <a href="{{ route('products.index') }}"> 商品一覧</a> > {{ $product->name }}
    </div>
    
    <form id="update-form"
      action="{{ route('products.update', $product->id) }}"
      method="POST"
      enctype="multipart/form-data">
       @csrf
       @method('PUT')
    
     <div class="detail-content">
      
      <div class="detail-image">
         <img src="{{ asset('storage/' . $product->image) }}">
            <p style="margin-top:10px;">現在の画像：{{ $product->image }}</p>
         <input type="file" name="image">

        @error('image')
          <p style="color:red">{{ $message }}</p>
        @enderror 
      </div>
     
      <div class="detail-form">
        
       <div class="form-group">
        <label>商品名</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">

        @error('name')
        <p style="color:red">{{ $message }}</p>
        @enderror
      </div>

       <div class="form-group">
        <label>価格</label>
        <input type="text" name="price" value="{{ old('price', $product->price) }}">

        @error('price')
        <p style="color:red">{{ $message }}</p>
        @enderror
       </div>
        
     <div class="form-group">
      <label>季節</label>

      <div class="season-group">
        
      @foreach($seasons as $season)

     <label class="season-item">

        <input
        type="checkbox"
        name="seasons[]"
        value="{{ $season->id }}"
        {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}
        >

       {{ $season->name }}

     </label>

     @endforeach
 </div> 
     
     @error('seasons')
     <p style="color:red">{{ $message }}</p>
     @enderror
    </div>

   <div class="form-group">
      <label>商品説明</label>
      
      <textarea name="description">{{ old('description', $product->description) }}</textarea>
       @error('description')
       <p style="color:red">{{ $message }}</p>
       @enderror
    </div>
   </div> {{-- detail-form --}}
  </div> {{-- detail-content --}}
 </form> 
 
 <div class="button-area">

    <button type="button" onclick="location.href='{{ route('products.index') }}'">
      戻る
    </button>
    
    <button type="submit" form="update-form" class="save-btn">
      変更を保存
    </button>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form">
       @csrf
       @method('DELETE')
   
     <button type="submit" class="delete-btn"
      onclick="return confirm('本当に削除しますか？')">
      <i class="fas fa-trash"></i>
     </button>
    </form>

   </div>       
 
</div> {{-- detail-container --}}

@endsection