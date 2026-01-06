{{-- Para mas iconos ingresar al link --}}
{{-- https://fonts.google.com/icons --}}
{{-- Fin iconos --}}

<div class="sidebar-panel">
    <div class="sidebar-compact-switch"><span></span>
        <div></div>
        <span></span>
    </div>
    <div class=""><img src="{{ asset('assets/images/logo_180.png') }}" alt="" width="160" /></div>
    <!-- Start:: user-->
    <div class="scroll-nav" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <div class="app-user text-center">
            <div class="app-user-photo"><img src="{{ asset('assets/images/avatars/003-man-1.svg') }}" alt="" />
            </div>
            <div class="app-user-info"><span
                    class="app-user-name">{{ \Illuminate\Support\Facades\Auth::User()->name }}</span>
            </div>
        </div>
        <!-- End:: user-->
        <!-- Start:: side-nav-->
        <div class="side-nav">
            <div class="main-menu">
                <nav class="sidebar-nav">
                    <ul class="metismenu show-on-load" id="ul-menu">
                        <li><a class="bullet" href="{{ url('home') }}"><i
                                    class="material-icons nav-icon">home</i>INICIO</a></li>
                        @if (\Illuminate\Support\Facades\Auth::User()->nivel == '12')
                            {{-- Administrador --}}
                            <li><a class="has-arrow" href="#"><i
                                        class="material-icons nav-icon">computer</i>Administrador</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="{{ url('registro') }}"><i
                                                class="material-icons nav-icon">person</i>Registrar Usuario</a></li>
                                    <li><a class="bullet-icon" href="{{ url('listado_usuario') }}"><i
                                                class="material-icons nav-icon">list</i>Listado Usuarios</a></li>
                                    <li><a class="bullet-icon" href="{{ url('listado_roles') }}"><i
                                                class="material-icons nav-icon">list</i>Listado Roles</a></li>
                                </ul>
                            </li>
                        @endif
                        @if (\Illuminate\Support\Facades\Auth::User()->nivel == '13')
                            {{-- Controlador --}}
                            <li><a class="has-arrow" href="#"><i
                                        class="material-icons nav-icon">cell_tower</i>FPL</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="{{ url('transito_aereo') }}"><i
                                                class="material-icons nav-icon">alt_route</i>Proceso de Vuelo</a></li>
                                </ul>
                            </li>
                        @endif
                        @if (\Illuminate\Support\Facades\Auth::User()->nivel == '14')
                            {{-- Registro Sobrevuelo --}}
                            <li>
                                <a class="bullet" href="{{ url('registro-adicion-sobrevuelo') }}">
                                    <i class="material-icons nav-icon">flight_takeoff</i>Sobrevuelo
                                </a>
                            </li>
                            <li>
                                <a class="bullet" href="{{ url('autorizacion/index') }}">
                                    <i class="material-icons nav-icon">check_circle</i>Autorización
                                </a>
                            </li>
                            <li>
                                <a class="bullet" href="{{ url('matricula/index') }}">
                                    <i class="material-icons nav-icon">assignment</i>Matrícula
                                </a>
                            </li>
                            <li>
                                <a class="bullet" href="{{ url('cliente/index') }}">
                                    <i class="material-icons nav-icon">person</i>Cliente
                                </a>
                            </li>
                            <li>
                                <a class="bullet" href="{{ url('aeropuerto/index') }}">
                                    <i class="material-icons nav-icon">local_airport</i>Aeropuerto
                                </a>
                            </li>
                            <li>
                                <a class="bullet" href="{{ url('ruta/index') }}">
                                    <i class="material-icons nav-icon">alt_route</i>Ruta DCT
                                </a>
                            </li>
                            <li>
                                <a class="has-arrow" href="#">
                                    <i class="material-icons nav-icon">insights</i>Reportes
                                </a>
                                <ul class="mm-collapse">
                                    <li>
                                        <a class="nav-link d-flex align-items-center"
                                            href="{{ url('reporte/resumen_cantidad') }}">
                                            <i class="material-icons nav-icon me-2">assessment</i>
                                            <span>Resumen Cantidad</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="bullet-icon" href="{{ url('reporte/formulario002') }}">
                                            <i class="material-icons nav-icon">description</i>Formulario 002
                                        </a>
                                    </li>
                                    <li>
                                        <a class="bullet-icon" href="{{ url('reporte/por_fecha') }}">
                                            <i class="material-icons nav-icon">event_note</i>Por Fecha
                                        </a>
                                    </li>
                                    <li>
                                        <a class="bullet-icon" href="{{ url('reporte/rvsm') }}">
                                            <i class="material-icons">insights</i>RVSM
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (\Illuminate\Support\Facades\Auth::User()->nivel == '15')
                            {{-- Monitoreo Comunicacion --}}
                            {{-- <li><a class="has-arrow" href="#"><i
                                        class="material-icons nav-icon">cell_tower</i>MONITOREO</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="{{ url('sobrevuelos') }}"><i
                                                class="material-icons nav-icon">alt_route</i>Sobrevuelos</a></li>
                                </ul>
                            </li> --}}

                            <li>
                                <a class="bullet" href="{{ url('sobrevuelos') }}">
                                    <i class="material-icons nav-icon">wifi_tethering</i>
                                    <span class="ms-1">Monitoreo</span>
                                </a>
                            </li>
                            <li>
                                <a class="bullet"
                                    href="{{ route('comunicacion.index_ingreso', ['tipo' => 'INGRESO']) }}">
                                    <i class="material-icons nav-icon me-1">flight_takeoff</i>
                                    <span class="ms-1">Autorización Ingreso</span>
                                </a>
                            </li>
                            <li>
                                <a class="bullet"
                                    href="{{ route('comunicacion.index_ingreso', ['tipo' => 'SALIDA']) }}">
                                    <i class="material-icons nav-icon me-1">flight_land</i>
                                    <span class="ms-1">Autorización Salida</span>
                                </a>
                            </li>
                            <li>
                                <a class="bullet"
                                    href="{{ route('comunicacion.index_ingreso', ['tipo' => 'SOBREVUELO']) }}">
                                    <i class="material-icons nav-icon me-1">airplanemode_active</i>
                                    <span class="ms-1">Autorización Sobrevuelo</span>
                                </a>
                            </li>
                        @endif
                        @if (\Illuminate\Support\Facades\Auth::User()->nivel == '16')
                            {{-- Aprobacion Sobrevuelo --}}
                            <li><a class="has-arrow" href="#"><i
                                        class="material-icons nav-icon">cell_tower</i>APROBAR</a>
                                <ul class="mm-collapse">
                                    <li><a class="bullet-icon" href="{{ url('aprobar_sobrevuelo') }}"><i
                                                class="material-icons nav-icon">alt_route</i>Sobrevuelos</a></li>
                                </ul>
                            </li>
                        @endif
                        @if (\Illuminate\Support\Facades\Auth::User()->nivel == '17')
                            {{-- Registro Autorizaciones FPL --}}
                            <li>
                                <a class="bullet" href="{{ url('autorizacion/index_ingreso') }}">
                                    <i class="material-icons nav-icon">flight_takeoff</i>Ingreso / Salida
                                </a>
                            </li>
                            <li>
                                <a class="bullet" href="{{ url('autorizacion/index_sobrevuelo') }}">
                                    <i class="material-icons nav-icon">check_circle</i>Sobrevuelo
                                </a>
                            </li>
                        @endif
                        @if (\Illuminate\Support\Facades\Auth::User()->nivel == '19')
                            <li>
                                <a class="bullet" href="{{ url('dgac_monitor') }}">
                                    <i class="material-icons nav-icon">flight_takeoff</i>Monitor
                                </a>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
