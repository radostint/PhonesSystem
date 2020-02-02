<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{ asset('css/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.css') }}" rel="stylesheet">


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark" style="box-shadow: 0 0 50px black;font-family: muli">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/images/logo.png" style="height: 42px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @if(Auth::user()->isAdmin)
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ url('/admin/users')  }}" {{request()->is('admin/users*') ? 'style=color:white' : ''}}>{{ __('Users') }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ url('/phones')  }}" {{request()->is('phones*') ? 'style=color:white' : ''}}>{{ __('Phones') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ url('/manufacturers')  }}" {{request()->is('manufacturers*') ? 'style=color:white' : ''}}>{{ __('Manufacturers') }}</a>
                        </li>
                        <li>
                            <form action="{{ url('search') }}" method="post" id="search" autocomplete="off">
                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                <div class="searchbar">
                                    <input class="search_input" type="text" name="query" placeholder="Search...">
                                    <a href="#" class="search_icon"
                                       onclick="document.getElementById('search').submit()"><i
                                            class="fas fa-search"></i></a>
                                </div>
                            </form>
                        </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                           style="padding-left: 56px; position: relative;" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="/storage/{{ Auth::user()->avatar }}"
                                 style="width:40px; height:40px; position:absolute; top:1px; left:10px; border-radius:50%">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ url('/profile') }}" class="dropdown-item">
                                <i class="fa fa-btn fa-user" style="font-size: 18px;"></i>
                                <span style="font-weight: bold; padding-left: 10px;">Profile</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt" style="font-size: 18px;"></i>
                                <span style="font-weight: bold; padding-left: 10px;">Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" style="padding-top: 50px !important;">
        @yield('content')
    </main>
    <div id="footer">
        <footer class="py-4 bg-primary flex-shrink-0">
            <div class="container text-center">
                <h6>Copyright &copy; 2020 Radostin Todorov</h6>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
