@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">
        <div class="container">
            <form id="busquedaHistoricaForm">

                <div class="row">
                    <div class="col-md-6 mb-md">
                        <div class="control-group">
                            <label for="fecha_vuelo">Fecha de Vuelo:(*)</label>
                            <input type="date" class="form-control" name="fecha_search" id="fecha_search" value=""
                                required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-md">
                        <div class="control-group">
                            <label for="vuelo">Vuelo:(*)</label>
                            <input type="text" class="form-control" name="vuelo_search" id="vuelo_search"
                                placeholder="Introduzca vuelo" value="" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-md">
                        <label for="origen">Origen</label>
                        <select class="select2basico" name="origen_search" id="origen_search">
                            <option value="">Seleccione Origen</option>
                            @foreach ($data4 as $aeropuerto)
                                <option value="{{ $aeropuerto->cd_oaci }}">{{ $aeropuerto->cd_oaci }} -
                                    {{ $aeropuerto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-md">
                        <label for="destino">Destino</label>
                        <select class="select2basico" name="destino_search" id="destino_search">
                            <option value="">Seleccione Destino</option>
                            @foreach ($data4 as $aeropuerto)
                                <option value="{{ $aeropuerto->cd_oaci }}">{{ $aeropuerto->cd_oaci }} -
                                    {{ $aeropuerto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-md">
                        <div class="control-group">
                            <label for="matricula">Matrícula:</label>
                            <input type="text" class="form-control" name="reg_search" id="reg_search"
                                onkeyup="mayusculas(this)" placeholder="Introduzca Matrícula" value="">
                        </div>
                    </div>
                </div>

                <br>
                <div class="d-flex">
                    <div class="flex-grow-1"></div>
                    <button type="submit" class="btn btn-flat btn-primary">Buscar</button>
                    &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-opacity btn-danger mr-md" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
            <br>
            <div class="row">
                <table id="basicDatatable" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">FECHA</th>
                            <th scope="col">VUELO</th>
                            <th scope="col">RUTA</th>
                            <th scope="col">ATD</th>
                            <th scope="col">EST</th>
                            <th scope="col">NIVEL</th>
                            <th scope="col">SQ</th>
                            <th scope="col">H.A.</th>
                            <th scope="col" style="width: 150px"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <br>
    {{-- <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-md">
            <div class="card">
                <div class="card-body d-flex">
                    <div><span class="badge badge-opacity badge-primary rounded-circle mb-sm"><i class="material-icons">show_chart</i></span>
                        <h6 class="heading-muted mb-xs">Sales</h6>
                        <h4 class="font-weight-bold">950,00</h4><span class="text-primary">Over last month 2.4%</span>
                    </div>
                    <div id="trafficPie"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-md">
            <div class="card">
                <div class="card-body"><span class="badge badge-opacity badge-success rounded-circle mb-sm"><i
                            class="material-icons">storage</i></span>
                    <h6 class="heading-muted mb-xs">Items</h6>
                    <h4 class="font-weight-bold">430,00</h4><span class="text-success">Over last month 2.4%</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-md">
            <div class="card">
                <div class="card-body"><span class="badge badge-opacity badge-info rounded-circle mb-sm"><i
                            class="material-icons">supervisor_account</i></span>
                    <h6 class="heading-muted mb-xs">Items</h6>
                    <h4 class="font-weight-bold">278,00</h4><span class="text-info">Over last month 7.4%</span>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12 mb-md">
            <div class="card">
                <div class="card-body pl-xs pb-0 pr-sm">
                    <div class="card-title pl-md">Monthly Recap Statistics</div>
                    <div id="sales2"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-md">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <div class="card-title mb-xxxl">Sales by Countries</div>
                    <div class="my-auto"></div>
                    <div class="mx-auto" id="salesByCountries" style="max-width: 360px"></div>
                    <div class="my-auto"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted m-0">Total Profit</p>
                        <div class="dropdown">
                            <button class="btn btn-secondary rounded-circle btn-icon m-0" id="dropdownMenuButton"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons">more_horiz</i></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item"
                                                                                               href="#"><i
                                        class="material-icons icon icon-sm">visibility</i>Action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">message</i>Another
                                    action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">settings</i>Something
                                    else</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="my-md font-weight-bold">$42,000</h4>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center mr-2"><span
                                class="badge badge-opacity badge-success badge-xs rounded-circle mr-1"><i
                                    class="material-icons">call_made</i></span><span
                                class="text-success">+33.57%</span></div>
                        <div class="text-muted">Profit in this period</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted m-0">Total Expense</p>
                        <div class="dropdown">
                            <button class="btn btn-secondary rounded-circle btn-icon m-0" id="dropdownMenuButton"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons">more_horiz</i></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item"
                                                                                               href="#"><i
                                        class="material-icons icon icon-sm">visibility</i>Action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">message</i>Another
                                    action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">settings</i>Something
                                    else</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="my-md font-weight-bold">$22,000</h4>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center mr-2"><span
                                class="badge badge-opacity badge-danger badge-xs rounded-circle mr-1"><i
                                    class="material-icons">call_received</i></span><span
                                class="text-danger">+10.57%</span></div>
                        <div class="text-muted">Profit in this period</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted m-0">Total Visitor</p>
                        <div class="dropdown">
                            <button class="btn btn-secondary rounded-circle btn-icon m-0" id="dropdownMenuButton"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons">more_horiz</i></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item"
                                                                                               href="#"><i
                                        class="material-icons icon icon-sm">visibility</i>Action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">message</i>Another
                                    action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">settings</i>Something
                                    else</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="my-md font-weight-bold">72,000</h4>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center mr-2"><span
                                class="badge badge-opacity badge-success badge-xs rounded-circle mr-1"><i
                                    class="material-icons">call_made</i></span><span
                                class="text-success">+10.57%</span></div>
                        <div class="text-muted">Profit in this period</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted m-0">New Customer</p>
                        <div class="dropdown">
                            <button class="btn btn-secondary rounded-circle btn-icon m-0" id="dropdownMenuButton"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons">more_horiz</i></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item"
                                                                                               href="#"><i
                                        class="material-icons icon icon-sm">visibility</i>Action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">message</i>Another
                                    action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">settings</i>Something
                                    else</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="my-md font-weight-bold">192.00</h4>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center mr-2"><span
                                class="badge badge-opacity badge-danger badge-xs rounded-circle mr-1"><i
                                    class="material-icons">call_received</i></span><span
                                class="text-danger">+10.57%</span></div>
                        <div class="text-muted">Profit in this period</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card-title"> Visitors Analytic</div>
                        <div class="dropdown">
                            <button class="btn btn-secondary rounded-circle btn-icon m-0" id="dropdownMenuButton"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons">more_horiz</i></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item"
                                                                                               href="#"><i
                                        class="material-icons">build</i>Action</a><a class="dropdown-item"
                                                                                     href="#"><i
                                        class="material-icons">add_shopping_cart</i>Another action</a><a
                                    class="dropdown-item" href="#"><i class="material-icons">create</i>Something</a>
                            </div>
                        </div>
                    </div>
                    <div id="sales2-2"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card-title">Manage Order</div>
                        <div class="dropdown">
                            <button class="btn btn-secondary rounded-circle btn-icon m-0" id="dropdownMenuButton"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons">more_horiz</i></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item"
                                                                                               href="#"><i
                                        class="material-icons icon icon-sm">visibility</i>Action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">message</i>Another
                                    action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">settings</i>Something
                                    else</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-lg">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="align-middle" scope="row">#0032</td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center"><img class="avatar-sm rounded-circle mr-2"
                                                                                src="assets/images/faces/2.jpg" alt=""/>
                                        <p class="m-0">Jhon Doe</p>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <p class="m-0">22 Mar 20, 6:30 PM</p>
                                </td>
                                <td class="align-middle">
                                    <p class="font-weight-semi m-0 text-success">$950.00</p>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center"><span
                                            class="badge badge-opacity badge-success rounded-circle badge-xxs mr-2"><i
                                                class="material-icons">done</i></span>Paid
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-icon rounded-circle" id="dropdownMenuButton"
                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a
                                                class="dropdown-item" href="#">View Order</a><a class="dropdown-item"
                                                                                                href="#">Refund</a><a
                                                class="dropdown-item" href="#">Delete</a></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle" scope="row">#0033</td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center"><img class="avatar-sm rounded-circle mr-2"
                                                                                src="assets/images/faces/3.jpg" alt=""/>
                                        <p class="m-0">Wraith</p>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <p class="m-0">22 Mar 20, 6:30 PM</p>
                                </td>
                                <td class="align-middle">
                                    <p class="font-weight-semi m-0 text-success">$950.00</p>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center"><span
                                            class="badge badge-opacity badge-success rounded-circle badge-xxs mr-2"><i
                                                class="material-icons">done</i></span>Paid
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-icon rounded-circle" id="dropdownMenuButton"
                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a
                                                class="dropdown-item" href="#">View Order</a><a class="dropdown-item"
                                                                                                href="#">Refund</a><a
                                                class="dropdown-item" href="#">Delete</a></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle" scope="row">#0034</td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center"><img class="avatar-sm rounded-circle mr-2"
                                                                                src="assets/images/faces/4.jpg" alt=""/>
                                        <p class="m-0">Tim Clark</p>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <p class="m-0">22 Mar 20, 6:30 PM</p>
                                </td>
                                <td class="align-middle">
                                    <p class="font-weight-semi m-0 text-success">$950.00</p>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center"><span
                                            class="badge badge-opacity badge-success rounded-circle badge-xxs mr-2"><i
                                                class="material-icons">done</i></span>Paid
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-icon rounded-circle" id="dropdownMenuButton"
                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a
                                                class="dropdown-item" href="#">View Order</a><a class="dropdown-item"
                                                                                                href="#">Refund</a><a
                                                class="dropdown-item" href="#">Delete</a></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle" scope="row">#0035</td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center"><img class="avatar-sm rounded-circle mr-2"
                                                                                src="assets/images/faces/5.jpg" alt=""/>
                                        <p class="m-0">Jhon Doe</p>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <p class="m-0">22 Mar 20, 6:30 PM</p>
                                </td>
                                <td class="align-middle">
                                    <p class="font-weight-semi m-0 text-success">$950.00</p>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center"><span
                                            class="badge badge-opacity badge-success rounded-circle badge-xxs mr-2"><i
                                                class="material-icons">done</i></span>Paid
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-icon rounded-circle" id="dropdownMenuButton"
                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="material-icons">more_horiz</i></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a
                                                class="dropdown-item" href="#">View Order</a><a class="dropdown-item"
                                                                                                href="#">Refund</a><a
                                                class="dropdown-item" href="#">Delete</a></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-md">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card-title">Recent Transiction</div>
                        <div class="dropdown">
                            <button class="btn btn-secondary rounded-circle btn-icon m-0" id="dropdownMenuButton"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="material-icons">more_horiz</i></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item"
                                                                                               href="#"><i
                                        class="material-icons icon icon-sm">visibility</i>Action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">message</i>Another
                                    action</a>
                                <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">settings</i>Something
                                    else</a>
                            </div>
                        </div>
                    </div>
                    <div class="ul-list-group-1 mb-md">
                        <div class="ul-list-item"><a href="#">
                                <div class="d-flex justify-content-between align-items-center"><img
                                        class="avatar-md rounded-circle mr-2" src="assets/images/faces/2.jpg" alt=""/>
                                    <div class="flex-grow-1">
                                        <h6 class="text-13 m-0">Dan Fox</h6><small class="text-muted">ID: #02298</small>
                                    </div>
                                    <div class="ul-list-item-action">
                                        <p class="font-weight-bold m-0 text-success">$300.00</p>
                                    </div>
                                </div>
                            </a></div>
                        <div class="ul-list-item">
                            <div class="d-flex justify-content-between align-items-center"><img
                                    class="avatar-md rounded-circle mr-2" src="assets/images/faces/3.jpg" alt=""/>
                                <div class="flex-grow-1">
                                    <h6 class="text-13 m-0">Dan Fox</h6><small class="text-muted">ID: #02298</small>
                                </div>
                                <div class="ul-list-item-action">
                                    <p class="font-weight-bold m-0 text-success">$300.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="ul-list-item">
                            <div class="d-flex justify-content-between align-items-center"><img
                                    class="avatar-md rounded-circle mr-2" src="assets/images/faces/4.jpg" alt=""/>
                                <div class="flex-grow-1">
                                    <h6 class="text-13 m-0">Dan Fox</h6><small class="text-muted">ID: #02298</small>
                                </div>
                                <div class="ul-list-item-action">
                                    <p class="font-weight-bold m-0 text-success">$300.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="ul-list-item">
                            <div class="d-flex justify-content-between align-items-center"><img
                                    class="avatar-md rounded-circle mr-2" src="assets/images/faces/5.jpg" alt=""/>
                                <div class="flex-grow-1">
                                    <h6 class="text-13 m-0">Dan Fox</h6><small class="text-muted">ID: #02298</small>
                                </div>
                                <div class="ul-list-item-action">
                                    <p class="font-weight-bold m-0 text-success">$300.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="ul-list-item">
                            <div class="d-flex justify-content-between align-items-center"><img
                                    class="avatar-md rounded-circle mr-2" src="assets/images/faces/9.jpg" alt=""/>
                                <div class="flex-grow-1">
                                    <h6 class="text-13 m-0">Dan Fox</h6><small class="text-muted">ID: #02298</small>
                                </div>
                                <div class="ul-list-item-action">
                                    <p class="font-weight-bold m-0 text-success">$300.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-raised-primary btn-block">View More</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
