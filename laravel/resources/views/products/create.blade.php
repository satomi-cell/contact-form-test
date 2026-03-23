@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')

<div class="create-container">
  <h1 class="create-title">商品登録</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
   <label class="form-label">
     商品名 <span class="required">必須</span>
   </label>
   <input type="text" name="name" class="form-input" value="{{ old('name') }}">

    @foreach ($errors->get('name') as $message)
      <p style="color:red">{{ $message }}</p>
    @endforeach
</div>

<div class="form-group">
    <label class="form-label">
     価格 <span class="required">必須</span>
    </label>
    <input type="text" name="price" class="form-input" value="{{ old('price') }}">

     @foreach ($errors->get('price') as $message)
      <p style="color:red">{{ $message }}</p>
     @endforeach
</div>

<div class="form-group">
  <label class="form-label">
    商品画像 <span class="required">必須</span>
  </label>

  <input type="file" name="image">

  @foreach ($errors->get('image') as $message)
    <p style="color:red">{{ $message }}</p>
  @endforeach
</div>

<div class="form-group">

  <label class="form-label">
    季節 
    <span class="required">必須</span>
    <span class="multiple">複数選択可</span>
  </label>
  
  <div class="season-group">
  
      @foreach($seasons as $season)

      <label>
        <input
        type="checkbox"
        name="seasons[]"
        value="{{ $season->id }}"
       {{ in_array($season->id, old('seasons', [])) ? 'checked' : '' }}
       >
       {{ $season->name }}
      </label>
      @endforeach
    </div>
  
    @foreach ($errors->get('seasons') as $message)
      <p style="color:red">{{ $message }}</p>
    @endforeach

</div>

<div class="form-group">
  <label class="form-label">
    商品説明 <span class="required">必須</span>
  </label>
  <textarea name="description" class="form-textarea">{{ old('description') }}</textarea>

    @foreach ($errors->get('description') as $message)
      <p style="color:red">{{ $message }}</p>
    @endforeach
</div>

<div class="form-buttons">
  <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
  <button type="submit" class="btn-submit">登録</button>
</div>

</form>

@endsection