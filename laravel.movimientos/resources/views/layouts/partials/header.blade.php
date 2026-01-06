<header class="main-header bg-card d-flex flex-row justify-content-between align-items-center px-lg">
    <!-- Start::Header menu-->
    <div>
        <div class="ul-header-menu-wrap"><i class="material-icons ul-header-menu-toggle">close</i>
            <div class="ul-header-menu">
                <ul class="ul-header-nav">
                    <li class="ul-menu-item ul-menu-item--active"><a class="ul-menu-link" href="#">Inicio</a></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- End::Header menu-->
    <div class="ul-header-topbar">
        <div class="flex-grow-1"></div>
        <div class="ul-search-full-width">

            {{-- NOTIFICACIONES --}}
            @include('aprobador.notificacion')
            {{-- NOTIFICACIONES --}}

            {{-- <button class="toggle-search btn btn-opacity-default rounded-circle btn-icon mx-xs" type="button"><i class="material-icons">search</i></button> --}}
            <div class="ul-search-input-area">
                <input id="app-search" type="text" placeholder="Explore Arctic..." aria-label="Search" />
                <button class="btn btn-opacity-default rounded-circle btn-icon toggle-search" type="button"><i
                        class="material-icons">close</i></button>
            </div>
            <div class="ul-search-result-area">
                <div class="search-result"></div>
            </div>
        </div>
        <div class="dropdown language-dropdown mx-xx">

            <div class="header-btn-group">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ \Illuminate\Support\Facades\Auth::User()->name }}
                <button class="btn btn-opacity-default rounded-circle btn-icon" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img class="avatar-xs rounded-circle" src="{{ asset('assets/images/avatars/003-man-1.svg') }}"
                        alt="" />
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('actualizar_contrasena') }}"> <img
                            class="avatar-xxs rounded-circle mr-sm"
                            src="{{ asset('assets/images/avatars/003-man-1.svg') }}" alt="" />Cambiar
                        Contraseña</a>
                    <hr>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit"><img class="avatar-xxs rounded-circle mr-sm"
                                src="{{ asset('assets/images/avatars/003-man-1.svg') }}" alt="" /><b>Cerrar
                                Sessón</b></button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</header>
