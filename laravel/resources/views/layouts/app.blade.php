<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>

    <!-- 共通CSS -->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- ページごとのCSS -->
    @yield('css')
</head>

<body>

<!-- ===== ヘッダー ===== -->
<header class="header">
    <div class="header-inner">

        <h1 class="logo">
            <a href="/">mogitate</a>
        </h1>

        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-button">
                logout
            </button>
        </form>
        @endauth

    </div>
</header>

<!-- ===== ページ内容 ===== -->
<main class="main">
    @yield('content')
</main>

</body>
</html>