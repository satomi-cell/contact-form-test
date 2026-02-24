<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{--<link rel="stylesheet" href="{{ asset('css/contact.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">--}}
</head>

<body class="bg-[#f8f6f4]">

    <!-- ===== 共通ヘッダー ===== -->
<header class="bg-white shadow">
    <div class="relative max-w-6xl mx-auto px-4 py-4 flex items-center">

        <div></div>

      <h1 class="absolute left-1/2 -translate-x-1/2 text-2xl font-serif text-gray-700">
          FashionablyLate
      </h1>

<div class="ml-auto">
 @auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="text-sm border px-4 py-1 rounded hover:bg-gray-100">
            logout
        </button>
    </form>
 @endauth
</div> 
   </div>
</header>
    <!-- ===== ページ内容 ===== -->
    <main class="py-10">
        @yield('content')
    </main>

</body>
</html>