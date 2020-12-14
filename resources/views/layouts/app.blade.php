<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <html lang="es">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pizza Shop</title>

    <!-- Scripts -->


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/submit.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ ('home') }}">
                    Pizza Shop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @can('haveaccess','role.index')
                        <li class="nav-item"> <a href="{{route('role.index')}}" class="nav-link"> Roles</a></li>
                    @endcan
                    @can('haveaccess','user.index')
                        <li class="nav-item"> <a href="{{route('user.index')}}" class="nav-link"> Usuarios</a></li>
                    @endcan
                    @can('haveaccess','products.index')
                        <li class="nav-item"> <a href="{{route('products.index')}}" class="nav-link"> Productos</a></li>
                    @endcan
                    @can('haveaccess','posts.index')
                        <li class="nav-item"> <a href="{{route('posts.index')}}" class="nav-link"> Publicar </a></li>
                    @endcan
                    
                    @can('haveaccess','admin.order')
                    <li class="nav-item"> <a href="{{route('admin.order')}}" class="nav-link"> Ordenes </a></li>
                     @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                            <a class="navbar-brand" href="{{route('user.order')}}">Mis Ordenes</a>
                            <a class="navbar-brand" href="{{route('home')}}">Ordenar Pizza</a>
                            <!-- Admin Route -->

                            @include('partials.notifications-dropdown')

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/submit.js') }}" defer></script>
    @yield('js')
</body>
</html>
