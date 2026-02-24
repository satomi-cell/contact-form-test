@extends('layouts.app')

@section('content')
<div class="contact-wrapper">

    <h2 class="contact-title">Contact</h2>

    <form action="{{ route('contact.confirm') }}" method="POST" novalidate>
        @csrf

        {{-- お名前 --}}
        <div class="form-row">
            <div class="form-label">
                お名前 <span class="required">※</span>
            </div>
            <div class="form-input">
                <div class="name-group">
                    <input type="text" name="last_name" placeholder="例: 山田"
                        value="{{ old('last_name', request('last_name')) }}">
                    <input type="text" name="first_name" placeholder="例: 太郎"
                        value="{{ old('first_name', request('first_name')) }}">
                </div>
           
                @error('last_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
         
                @error('first_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        {{-- 性別 --}}
        <div class="form-row">
            <div class="form-label">
                性別 <span class="required">※</span>
            </div>
            <div class="form-input">
                <input type="radio" name="gender" value="男性"
                    {{ old('gender', request('gender')) == '男性' ? 'checked' : '' }}> 男性
                <input type="radio" name="gender" value="女性"
                    {{ old('gender', request('gender')) == '女性' ? 'checked' : '' }}> 女性
                <input type="radio" name="gender" value="その他"
                    {{ old('gender', request('gender')) == 'その他' ? 'checked' : '' }}> その他   
                    
                 @error('gender')
                    <div class="error-message">{{ $message }}</div>
                 @enderror
            
            </div>
        </div>

        {{-- メール --}}
        <div class="form-row">
            <div class="form-label">
                メールアドレス <span class="required">※</span>
            </div>
            <div class="form-input">
                <input type="email" name="email"
                    value="{{ old('email', request('email')) }}">
                 
                    @error('email')
                       <div class="error-message">{{ $message }}</div>
                    @enderror
            </div>
        </div>

        {{-- 電話番号 --}}
        <div class="form-row">
            <div class="form-label">
                電話番号 <span class="required">※</span>
            </div>
            <div class="form-input">
                <div class="tel-group">
                    <input type="text" name="tel1" value="{{ old('tel1', request('tel1')) }}">
                    <span>-</span>
                    <input type="text" name="tel2" value="{{ old('tel2', request('tel2')) }}">
                    <span>-</span>
                    <input type="text" name="tel3" value="{{ old('tel3', request('tel3')) }}">
                </div>
                
                @error('tel1')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            
                @error('tel2')
                    <div class="error-message">{{ $message }}</div>
                @enderror

                @error('tel3')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- 住所 --}}
        <div class="form-row">
            <div class="form-label">
                住所 <span class="required">※</span>
            </div>
            <div class="form-input">
                <input type="text" name="address"
                    value="{{ old('address', request('address')) }}">
              
                    @error('address')
                       <div class="error-message">{{ $message }}</div>
                    @enderror
            </div>
        </div>

        {{-- 建物名 --}}
        <div class="form-row">
            <div class="form-label">建物名</div>
            <div class="form-input">
                <input type="text" name="building"
                    value="{{ old('building', request('building')) }}">
            </div>
        </div>

        {{-- お問い合わせ種類 --}}
        <div class="form-row">
            <div class="form-label">
                お問い合わせの種類 <span class="required">※</span>
            </div>
            <div class="form-input">
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
                   <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- お問い合わせ内容 --}}
        <div class="form-row">
            <div class="form-label">
                お問い合わせ内容 <span class="required">※</span>
            </div>
            <div class="form-input">
                <textarea name="message">{{ old('message', request('message')) }}</textarea>
            
                @error('message')
                   <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="submit-btn">
            <button type="submit">確認画面</button>
        </div>

    </form>
</div>
@endsection