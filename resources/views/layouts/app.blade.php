<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', 'Module Based Training') }}</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen,projection" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="teal lighten-1" role="navigation">
                <div class="nav-wrapper container">
                    <a id="logo-container" href="{{ url('/') }}" class="brand-logo">{{ config('app.name', 'Module Based Training') }}</a>
                    <ul class="right hide-on-med-and-down">
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            @if ( Auth::user()->admin === 1 )
                                <li><a href="{{ url('/admin/modules') }}">Modules</a></li>
                                <li><a href="{{ url('/admin/users') }}">Users</a></li>
                                <li><a href="{{ url('/admin/results') }}">Results</a></li>
                            @else
                                @if ( Auth::user()->active === 1 )
                                    <li><a href="{{ url('/modules') }}">Modules</a></li>
                                    <li><a href="{{ url('/results') }}">Results</a></li>
                                @endif
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endguest
                    </ul>
                    <ul id="nav-mobile" class="side-nav">
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            @if ( Auth::user()->admin === 1 )
                                <li><a href="{{ url('/admin/modules') }}">Modules</a></li>
                                <li><a href="{{ url('/admin/users') }}">Users</a></li>
                                <li><a href="{{ url('/admin/results') }}">Results</a></li>
                            @else
                                @if ( Auth::user()->active === 1 )
                                    <li><a href="{{ url('/modules') }}">Modules</a></li>
                                    <li><a href="{{ url('/results') }}">Results</a></li>
                                @endif
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endguest
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="section">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="page-footer teal">
            <div class="footer-copyright">
                <div class="container">
                    <a class="white-text" href="https://github.com/JorgenPhi/training-modules">&copy; JorgenPhi/MBT</a>
                </div>
            </div>
        </footer>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>