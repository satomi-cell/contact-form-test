@extends('layouts.guest')

@section('title', 'Login')

@section('content')

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- メール -->
    <div>
        <label class="block text-sm text-[#7a6a5f]">
            メールアドレス
        </label>

        <input type="email"
               name="email"
               value="{{ old('email') }}"
               class="w-full mt-2 px-4 py-3 bg-gray-100 rounded-md">

        @error('email')
            <div class="text-red-500 text-sm mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- パスワード -->
    <div class="mt-6">
        <label class="block text-sm text-[#7a6a5f]">
            パスワード
        </label>

        <input type="password"
               name="password"
               class="w-full mt-2 px-4 py-3 bg-gray-100 rounded-md">

        @error('password')
            <div class="text-red-500 text-sm mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mt-10 text-center">
        <button type="submit"
                class="w-40 bg-[#7a6a5f] text-white py-3 rounded">
            ログイン
        </button>
    </div>

</form>

@endsection

