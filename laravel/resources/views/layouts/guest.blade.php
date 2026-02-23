<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FashionablyLate</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#d8cfc6]">

    <!-- ヘッダー -->
    <header class="bg-white py-6 shadow-sm relative">
        <h1 class="text-3xl text-center font-serif text-[#7a6a5f]">
            FashionablyLate
        </h1>

        @if (request()->routeIs('login'))
            <a href="{{ route('register') }}"
               class="absolute right-8 top-6 border px-4 py-1 rounded text-sm">
                register
            </a>
        @else
            <a href="{{ route('login') }}"
               class="absolute right-8 top-6 border px-4 py-1 rounded text-sm">
                login
            </a>
        @endif
    </header>

    <!-- メイン -->
    <div class="max-w-lg mx-auto mt-16 mb-16 bg-white p-10 pb-16 rounded-2xl shadow-xl">

        <h2 class="text-2xl font-serif text-[#7a6a5f] mb-8 text-center">
            @yield('title')
        </h2>

        @yield('content')

    </div>

</body>
</html>
