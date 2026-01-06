<!DOCTYPE html>

<head>
    <base href="../../">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IRAYA II ✈️</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400|Roboto:300,400,500,700,900|Material+Icons"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/plugins.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/session/session.v2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.bundle.min.css') }}">

    <style>
        /* Estilo para asegurar que el contenedor de partículas ocupe toda la pantalla */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #282c34;
            background-size: cover;
            background-position: 50% 50%;
            z-index: -1;
            /* Coloca el fondo de partículas detrás del contenido principal */
        }

        /* Aseguramos que el contenido principal esté encima del fondo de partículas */
        #page-wrapper {
            position: relative;
            z-index: 1;
        }

        /* Estilo adicional para el contenido, asegurando buena visibilidad */
        body {
            color: #ffffff;
            /* Color de texto blanco para buen contraste */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1,
        h2 {
            color: #ffffff;
            /* Color de texto blanco para títulos */
        }

        .inner {
            padding: 20px;
            /* Relleno para asegurar legibilidad */
        }

        /* Estilo específico para el encabezado */
        #header {
            position: relative;
            background: rgba(0, 0, 0, 0.7);
            /* Fondo semi-transparente para mejor visibilidad */
            padding: 20px;
            text-align: center;
        }

        #header h1 {
            font-size: 2em;
            margin: 0;
            color: #ffffff;
        }

        #header nav {
            margin-top: 10px;
        }

        .login-links a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 10px;
        }

        .login-links a:hover {
            text-decoration: underline;
        }

        /* Ajustes para el banner */
        #banner {
            text-align: center;
            padding: 100px 20px;
        }

        #banner .inner h2 {
            font-size: 2.5em;
            margin-bottom: 0.5em;
        }

        #banner .inner p {
            font-size: 1.2em;
        }

        /* Estilo para imágenes con bordes redondeados */
        .image img {
            border-radius: 15px;
            width: 100%;
            height: auto;
            /* Mantiene la proporción de las imágenes */
            display: block;
            margin: 0 auto;
        }
    </style>

    <!-- Incluir la biblioteca de particles.js desde un CDN -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

</head>

<body>
    <div class="section-left">

        <div class="section-left-content d-flex flex-column justify-content-center align-items-center text-center"
            style="height: 100vh;">
            <div id="particles-js"></div>
            <h1 class="text-36 font-weight-light text-white">Sistema de Seguimiento de Vuelos</h1>
            <h1 class="text-36 font-weight-light text-white">IRAYA II</h1>
            <p class="mb-24 text-small"></p>
            {{-- <button type="button" class="btn btn-raised btn-raised-warning">Sign Up</button> --}}
        </div>
    </div>
    <div class="form-holder signin-2 px-xxl" wit>
        <div data-perfect-scrollbar='' data-suppress-scroll-x='true'>
            <div class="d-flex flex-column align-items-center mt-lg mb-xxl">
                <img class="card-img-top signup" src="{{ asset('assets/images/logo-transparente.png') }}"
                    style="height: 120px; width: 300px" alt="Card image cap">
                <span class="text-primary text-18 d-block font-weight-bold"></span>
                <span class="mb-md text-muted mb-lg d-block">Iniciar sesión con su cuenta</span>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group with-icon input-light mb-xl">
                    <div class="input-group-prepend">
                        <i class="input-group-text material-icons">perm_identity</i>
                    </div>
                    <input type="email" class="form-control" placeholder="Correo" value="" name="email"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group with-icon input-light mb-xl">
                    <div class="input-group-prepend">
                        <i class="input-group-text material-icons">lock</i>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" value="With icon" name="password"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="mb-md custom-control custom-checkbox checkbox-primary mb-xl">
                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                    <label class="custom-control-label" for="customCheck2">Recordar contraseña</label>
                </div>
                <button type="submit" class="btn btn-raised btn-raised-primary btn-block">Ingresar</button>
                <div class="border-bottom mt-xxl mb-lg"></div>
            </form>
        </div>
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>


    </div>
</body>
<script src="{{ asset('assets/js/vendors.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.bundle.min.js') }}"></script>

<!-- Incluir la biblioteca de particles.js desde un CDN -->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

<!-- Script para inicializar las partículas -->
<script>
    particlesJS('particles-js', {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 5,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
</script>
