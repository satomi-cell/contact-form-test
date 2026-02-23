@extends('layouts.app')

@section('content')
<div class="contact-page container">
    <h2>Contact</h2>
   
 <form action="{{ route('contact.confirm') }}" method="POST" novalidate>
    @csrf

    {{-- お名前 --}}
    <div>
        <label>お名前 <span style="color:red;">※</span></label><br>
        
        <div class="input-area">
            <div class="name-group">
                <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name', request('last_name')) }}">
                <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name', request('first_name')) }}">
            </div>
            
            @error('last_name')
                <p class="error">{{ $message }}</p>
            @enderror
        
            @error('first_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
    </div>


    {{-- 性別 --}}
    <div>
       <label>性別 <span style="color:red;">※</span></label><br>

        <div class="input-area">
          <div class="radio-group">
            <input type="radio" name="gender" value="男性" {{ old('gender', request('gender')) == '男性' ? 'checked' : '' }}> 男性
            <input type="radio" name="gender" value="女性" {{ old('gender', request('gender')) == '女性' ? 'checked' : '' }}> 女性
            <input type="radio" name="gender" value="その他" {{ old('gender', request('gender')) == 'その他' ? 'checked' : '' }}> その他
          </div>
        
          @error('gender')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>
    </div>
    
    {{-- メール --}}
    <div>
        <label>メールアドレス <span style="color:red;">※</span></label><br>
        
        <div class="input-area">
            <input type="email" name="email" value="{{ old('email', request('email')) }}">
    
         @error('email')
            <p class="error">{{ $message }}</p>
         @enderror
        </div>
    </div>
    
    {{-- 電話番号 --}}
    <div>
        <label>電話番号<span style="color:red;">※</span></label><br>
        
        <div class="input-area">
           <div class="tel-group">
             <input type="text" name="tel1" size="4"
                value="{{ old('tel1', request('tel1')) }}">
             <span>-</span>
             <input type="text" name="tel2" size="4"
                value="{{ old('tel2', request('tel2')) }}">
             <span>-</span>
             <input type="text" name="tel3" size="4"
                value="{{ old('tel3', request('tel3')) }}">
           </div>
        </div>
    </div>
           
           @error('tel1')
               <p class="error">{{ $message }}</p>
           @enderror
    
   {{-- 住所 --}}
    <div>
        <label>住所<span style="color:red;">※</span></label><br>
        
        <div class="input-area">
            <input type="text" name="address" value="{{ old('address', request('address')) }}">
    
            @error('address')
                <p class="error">{{ $message }}</p>
            @enderror
       </div>
   </div>
    
   {{-- 建物名 --}}
    <div>
        <label>建物名</label><br>
        <input type="text" name="building" value="{{ old('building', request('building')) }}">
    </div>

    {{-- お問い合わせの種類 --}}
    <div>
        <label>お問い合わせの種類 <span style="color:red;">※</span></label><br>
        
     <div class="input-area">
      <select name="category">
        <option value="">選択してください</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category', request('category')) == $category->id ? 'selected' : '' }}>
                {{ $category->content }}
            </option>
        @endforeach

      </select>

       @error('category')
        <p class="error">{{ $message }}</p>
       @enderror
     </div>

    </div>
    
    {{-- お問い合わせ内容 --}}
    <div>
        <label>お問い合わせ内容 <span style="color:red;">※</span></label><br>
        
        <div class="input-area">
            <textarea name="message">{{ old('message', request('message')) }}</textarea>
    
            @error('message')
                <p class="error">{{ $message }}</p>
            @enderror    
        </div>
    </div>
    
    
    <button type="submit">確認画面</button>
 </form>
</div>
@endsection
