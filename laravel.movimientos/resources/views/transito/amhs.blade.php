{{-- AMHS en Linea --}}
<script src="/js/jquery-3.6.0.min.js"></script>

<style>
    .btn-inicio {
        display: inline-flex;
        align-items: center;
        background-color: #282c34;
        color: #ffffff;
        border: none;
        padding: 12px 20px;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-inicio i {
        margin-right: 8px;
    }

    .btn-inicio:hover {
        background-color: #3a3f47;
    }

    .btn-inicio:active {
        background-color: #1c2024;
    }

    /* botones */

    .nav-tabs .nav-link {
        color: #333;
        font-weight: bold;
        background-color: #f8f9fa;
        transition: background-color 0.3s, color 0.3s;
    }

    .nav-tabs .nav-link:hover {
        background-color: #ddd;
    }

    .nav-tabs .nav-link.active {
        background-color: #ff5722 !important;
        /* Color fuerte para la pestaña activa */
        color: white !important;
        border: 1px solid #ff5722;
        border-bottom: none;
    }

    #autorizado_speci {
        font-size: 0.8rem;
        font-weight: bold;
        padding: 4px 6px;
        border-radius: 4px;
        animation: cambioColorAutorizado 1s infinite alternate;
    }

    @keyframes cambioColorAutorizado {
        0% {
            background-color: #df5b0e;
            color: #fff;
        }

        50% {
            background-color: #dd6d2c;
            color: #fff;
        }

        100% {
            background-color: #a84a13;
            color: #fff;
        }
    }

    .nav-tabs .nav-link {
        padding: 4px 6px !important;
        /* ajusta vertical (4px) y horizontal (6px) */
    }

    /* nabvar */

    .barra-datos {
        display: inline-flex;
        background-color: #e0e0e0;
        border-radius: 4px;
        overflow: hidden;
        font-family: sans-serif;
    }

    .barra-datos .item {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 10px;
        border-right: 1px solid #ccc;
        white-space: nowrap;
        font-size: 14px;
        gap: 6px;
        /* espacio entre ícono y texto */
    }

    .barra-datos .item:last-child {
        border-right: none;
    }

    .barra-datos i {
        font-size: 16px;
    }

    .barra-datos .link {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="card" style="border-top: 5px solid #cd1f28;">
    {{-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0f2f2; font-size: 12px;">
        <a class="nav-link" href="/home"><span class="fa fa-home"></span><span class="sr-only">(current)</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="navbar-brand" href="/transito_aereo"><span class="fa fa-user"></span>&nbsp;&nbsp;
                        {{ $userTip->name }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#addNewCardModalPV"><span
                            class="fa fa-plane"></span>&nbsp;&nbsp;Nuevo FPL <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-clock fa-2x mr-sm"></i>
                        <span id="currentTime" style="font-size: 20px; text-transform: uppercase;"></span>
                    </a>

                </li>
            </ul>
        </div>
    </nav> --}}

    <div class="barra-datos">
        <div class="item"><a class="nav-link" href="/home"><span class="fa fa-home"></span><span
                    class="sr-only">(current)</span></a>
        </div>
        <div class="item"><span class="fa fa-user"></span>&nbsp;&nbsp; {{ $userTip->name }}</a>
        </div>
        <div class="item"> <a class="nav-link" href="#" data-toggle="modal"
                data-target="#addNewCardModalPV"><span class="fa fa-plane"></span>&nbsp;&nbsp;Nuevo FPL <span
                    class="sr-only">(current)</span></a>
        </div>
        <div class="item"><i class="fa fa-clock fa-2x mr-sm"></i>
            <span id="currentTime" style="font-size: 18px; text-transform: uppercase;"></span>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive-lg" id="tableContainer"
            style="height: 500px; overflow-y: scroll; overflow-x: hidden;">

            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home2" role="tab"
                        aria-controls="home" aria-selected="true">
                        <i class="fas fa-list-ul fa-sm"></i>
                        &nbsp;TODOS
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <button class="nav-link position-relative" id="profile-tab" data-toggle="tab"
                        data-target="#profile2" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">
                        <i class="fas fa-check-circle fa-sm"></i>
                        &nbsp;AUTORIZADOS
                        <span class="badge animate__animated animate__flash animate__infinite" id="autorizado_speci"
                            style="display: none;">
                            <i class="fas fa-check-circle"></i> NUEVO
                        </span>
                    </button>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" id="autorizados_filtro" data-toggle="tab" href="#home2" role="tab"
                        aria-controls="home" aria-selected="true">
                        <i class="fas fa-check-circle fa-sm"></i>
                        Autorizados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact2" role="tab"
                        aria-controls="contact" aria-selected="false">
                        <i class="fas fa-search fa-sm"></i>
                        &nbsp;BUSCADOR
                    </a>
                </li>
            </ul>

            <!-- Estilos personalizados -->

            <div class="tab-content" id="myTabContent">

                {{-- AMHS General --}}
                <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">

                    <!-- Campo de búsqueda -->
                    <div class="d-flex align-items-center">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>&nbsp;&nbsp;
                            <input type="text" id="searchInput" placeholder="Buscar AMHS..." class="form-control"
                                style="width: 30%;">

                            <div class="form-check form-check-inline ml-2">
                                <i class="fas fa-plane-departure"></i>&nbsp;&nbsp;
                                <input class="form-check-input" type="checkbox" id="origen_filtro"
                                    value="origen_filtro">
                                <label class="form-check-label" for="inlineCheckbox1">Origen</label>
                            </div>

                            <div class="form-check form-check-inline ml-2">
                                <i class="fas fa-plane-arrival"></i>&nbsp;&nbsp;
                                <input class="form-check-input" type="checkbox" id="destino_filtro"
                                    value="destino_filtro">
                                <label class="form-check-label" for="inlineCheckbox2">Destino</label>
                            </div>
                        </div>
                    </div>

                    <table class="table table-hover table-bordered table-striped" id="datatableScrollY" width="100%"
                        style="font-size: 15px;">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Vuelo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">EOBT</th>
                                <th scope="col">Regla</th>

                            </tr>
                        </thead>

                        <tbody id="amhs-data">

                        </tbody>
                    </table>

                    <div id="loadingIndicator" style="display: none; text-align: center; padding: 10px;">
                        <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                    </div>

                </div>

                {{-- AMHS Autorizados --}}
                {{-- <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab">

                    <!-- Campo de búsqueda -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" id="searchInputAutorizado" placeholder="Buscar AMHS..."
                            class="form-control">
                    </div>

                    <table class="table table-hover table-bordered table-striped" id="datatableScrollYAutorizados"
                        width="100%" style="font-size: 15px;">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Vuelo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">EOBT</th>
                                <th scope="col">Regla</th>
                            </tr>
                        </thead>

                        <tbody id="amhs-dataAutorizados">
                            <!-- Aquí se cargarán los datos por AJAX -->
                        </tbody>
                    </table>

                    <div id="loadingIndicatorAutorizados" style="display: none; text-align: center; padding: 10px;">
                        <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                    </div>

                </div> --}}

                {{-- AMHS Buscador --}}
                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab">
                    <form id="SearchForm">
                        <table width="100%" class="table table-hover table-bordered table-striped"
                            style="font-size: 15px;">
                            <thead>

                                <tr>
                                    <th scope="col"><input type="date" class="form-control"
                                            name="fecha_inicio_search" id="fecha_inicio_search" value=""
                                            placeholder="Fecha Inicio"></th>
                                    <th scope="col"><input type="date" class="form-control"
                                            name="fecha_fin_search" id="fecha_fin_search" value=""
                                            placeholder="Fecha Final"></th>
                                    <th scope="col"><input type="text" class="form-control"
                                            name="vuelo_search" id="vuelo_search" placeholder="Vuelo"
                                            value=""></th>
                                    <th scope="col"><input type="text" class="form-control"
                                            name="origen_search" id="origen_search" placeholder="Origen"
                                            value=""></th>
                                    <th scope="col"><input type="text" class="form-control"
                                            name="destino_search" id="destino_search" placeholder="Destino"
                                            value=""></th>
                                    <th scope="col">
                                        <select class="form-control" name="estado_search" id="estado_search">
                                            <option value="">Estado</option>
                                            <option value="LEIDO">LEIDO</option>
                                            <option value="TRABAJADO">TRABAJADO</option>
                                            <option value="AUTORIZADO">AUTORIZADO</option>
                                            <option value="IMPRESO">IMPRESO</option>
                                            <option value="REPETIDO">REPETIDO</option>
                                            <option value="CANCELADO">CANCELADO</option>
                                        </select>
                                    </th>
                                    <th scope="col">
                                        <button type="submit" id="button_search"
                                            class="btn btn-flat btn-warning btn-sm">Buscar</button>
                                    </th>
                                    <th scope="col"><button type="submit" id="button_search_reset"
                                            class="btn btn-flat btn-danger btn-sm">X</button></th>
                                </tr>

                            </thead>
                        </table>
                    </form>
                    <div id="loadingIndicatorSearch" style="display: none; text-align: center; padding: 10px;">
                        <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                    </div>

                    <table class="table table-hover table-bordered table-striped" id="datatableScrollYSearch"
                        width="100%" style="font-size: 15px;">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Vuelo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">EOBT</th>
                                <th scope="col">Regla</th>
                                {{-- <th scope="col">Linea Aérea</th>
                                <th scope="col">Usuario</th> --}}
                            </tr>
                        </thead>

                        <tbody id="amhs-data-search">
                            <!-- Aquí se cargarán los datos por AJAX -->
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>
{{-- AMHS en Linea --}}
