<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>FashionablyLate</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>
<body class="bg-[#f8f6f4]">

    <main class="py-10">
        @yield('content')
    </main>

</body>
</html>