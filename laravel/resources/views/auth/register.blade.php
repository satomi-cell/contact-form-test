@extends('layouts.guest')

@section('title', 'Register')

@section('content')

<form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- お名前 -->
        <div>
            <label for="name" class="block text-sm text-[#7a6a5f]">
                お名前
            </label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                class="w-full mt-2 px-4 py-3 bg-gray-100 rounded-md border-0 focus:outline-none"
            >

            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- メールアドレス -->
        <div class="mt-6">
            <label for="email" class="block text-sm text-[#7a6a5f]">
                メールアドレス
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                class="w-full mt-2 px-4 py-3 bg-gray-100 rounded-md border-0 focus:outline-none"
            >

            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- パスワード -->
        <div class="mt-6">
            <label for="password" class="block text-sm text-[#7a6a5f]">
                パスワード
            </label>

            <input
                id="password"
                type="password"
                name="password"
                required
                class="w-full mt-2 px-4 py-3 bg-gray-100 rounded-md border-0 focus:outline-none"
            >

            @error('password')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- 登録ボタン -->
        <div class="mt-6 text-center">
            <button
                type="submit"
                class="w-40 bg-[#7a6a5f] text-white py-3 rounded hover:opacity-80 transition"
            >
                登録
            </button>
        </div>

    </form>
        
@endsection
