<!DOCTYPE HTML>
<html>

<head>
    <title>IRAYA II ✈️</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('assets2/css/main.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets2/css/noscript.css') }} " />
    </noscript>
</head>

<body class="is-preload">

    <!-- Page Wrapper -->
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <h1><a href="#">Sistema de Seguimiento de Vuelos</a></h1>
            <nav>
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/home') }}" class="text-muted">Inicio</a>
                        @else
                            <a href="{{ route('login') }}" class="text-muted">Iniciar Sesión</a>
                            {{--                        @if (Route::has('register')) --}}
                            {{--                            <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a> --}}
                            {{--                        @endif --}}
                    @endif
        </div>
        @endif
        </nav>
        </header>

        <!-- Banner -->
        <section id="banner">
            <div class="inner">
                {{--            <div class="logo"><span class="icon fa-gem"></span></div> --}}
                <h2>Sistema de Seguimiento de Vuelos</h2>
                <h2>IRAYA II</h2>
            </div>
        </section>

        <!-- Wrapper -->
        <section id="wrapper">

            <!-- One -->
            <section id="one" class="wrapper spotlight style1">
                <div class="inner">
                    <a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
                    <div class="content">
                        <h2 class="major"></h2>
                        <p></p>
                        {{--                    <a href="#" class="special">Learn more</a> --}}
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <section id="footer">
                <div class="inner">
                    <h2 class="major"></h2>
                    <p></p>
                    <ul class="copyright">
                        <li>&copy; Navegación Aérea y Aeropuertos Bolivianos.</li>
                        <li><a href="#">Sistema de Seguimiento de Vuelos</a></li>
                    </ul>
                </div>
            </section>

            </div>

            <!-- Scripts -->
            <script src="{{ asset('assets2/js/jquery.min.js') }}"></script>
            <script src="{{ asset('assets2/js/jquery.scrollex.min.js') }}"></script>
            <script src="{{ asset('assets2/js/browser.min.js') }}"></script>
            <script src="{{ asset('assets2/js/breakpoints.min.js') }}"></script>
            <script src="{{ asset('assets2/js/util.js') }}"></script>
            <script src="{{ asset('assets2/js/main.js') }}"></script>

    </body>

    </html>
