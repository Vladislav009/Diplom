<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('pages.index') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                @if (Route::has('login'))
                @auth
                    <ul class="navbar-nav mr-auto">
                        <li class="dropdown">
                            <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Вопросы<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('questions.index') }}">Все</a></li>
                                <li><a href="{{ route('questions.create') }}">Создать</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Категории<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('categories.index') }}">Все</a></li>
                                <li><a href="{{ route('categories.create') }}">Создать</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Пользователи<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('users.index') }}">Все</a></li>
                                <li><a href="{{ route('users.create') }}">Создать</a></li>
                            </ul>
                        </li>
                    </ul>
                    @else
                    <p class="top-line">Авторизуйтесь, чтобы видеть панель управления.</p>
                    @endauth
                @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a></li>
                           <!--  <li><a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a></li> -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
