<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="navbar">
            <div class="hamburger" id="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <a class="header__logo" href="/">Rese</a>
            @if(Auth::check())
            <ul class="menu" id="menu">
                <li><a href="/">Home</a></li>
                <li>
                    <form class="form" action="/logout" method="post">
                    @csrf
                    <button class="form-button" action="/logout" method="post">Logout</button>
                    </form>
                </li>
                <li><a href="{{ route('mypage') }}">Mypage</a></li>
            </ul>
            @else
            <ul class="menu" id="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/register">Registration</a></li>
                <li><a href="/login">Login</a></li>
            </ul>
            @endif
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
