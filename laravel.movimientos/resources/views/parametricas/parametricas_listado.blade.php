@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{url('home')}}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Parametricas</li>
    <li class="breadcrumb-item active" aria-current="page">Parametricas Listado</li>
@endsection

@section('content')

    <div class="card-header">
        <button type="button" class="btn btn-raised btn-raised-primary" data-toggle="modal" data-target="#addNewCardModal"><span class="fa fa-plus-circle"></span> Adicionar</button>
        <a href="{{url('parametricas')}}" class="btn btn-raised btn-raised-default" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Salir</a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-header">
                <h2 class="p-1 m-0 text-16 font-weight-semi">Parametricas Listado</h2>
            </div>

            <div class="card">
                <div class="card-body">

                    <div id="accordion">
                        <div class="card">

                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">

                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge badge-opacity badge-rectangle badge-danger mr-md"> <i class="material-icons">thumb_up_off_alt</i></span>
                                            <div class="flex-grow-1">
                                                <h6 class="text-17 font-weight-normal m-0">Ver significado de los iconos o botones <b>"clic aquí".</b></h6>
                                            </div>
                                        </div>
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="alert d-flex p-0 col-3 rounded overflow-hidden align-items-stres" role="alert">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="btn btn-raised btn-raised-success rounded-circle btn-icon mr-2" data-toggle="tooltip" data-placement="top"><i class="fa fa-pen"></i></a>
                                            </div>
                                            <div class="p-md">
                                                <div class="card-title m-0">Editar parametrica</div>
                                                <span class="text-muted text-xl-center">Puede editar los datos de la parametrica.</span>
                                            </div>
                                        </div>



                                        <div class="alert d-flex p-0 col-3 rounded overflow-hidden align-items-stres" role="alert">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="btn btn-raised btn-raised-danger rounded-circle btn-icon mr-2" data-toggle="tooltip" data-placement="top"><i class="fa fa-arrows-rotate"></i></a>
                                            </div>
                                            <div class="p-md">
                                                <div class="card-title m-0">Deshabilitar</div>
                                                <span class="text-muted text-xl-center">Puede Deshabilitar la parametrica para que no sea tomado encuenta en los modulos del sistema.</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <table id="basicDatatable" class="table" style="width:100%">
                        <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Sigla</th>
                            <th>Activo</th>
                            <th>opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listar_parametricas as $l)
                            <tr>
                                <td>{{$l->descripcion}}</td>
                                <td>{{$l->sigla}}</td>
                                <td>
                                    @if ($l->activo == '1')
                                        <h5>Habilidato</h5>
                                    @else
                                        <h5 style="color:red;"><b>Deshabilitado</b></h5>
                                    @endif
                                </td>
                                <td width="200px" style="text-align: center">
                                    @if($l->activo == 1)
                                        @if($l->fk_id_parametrica == '5')
                                            <a href="{{url('parametricas_materiales',$l->pk_id_parametrica_descripcion)}}" class="btn btn-raised btn-raised-primary btn-sm btn-block"><span class="fa fa-list"></span> Listado</a>
                                        @endif

                                        <button class="btn btn-raised btn-raised-success rounded-circle btn-icon" data-toggle="modal" data-target="#addNewCardModal2{{$l->pk_id_parametrica_descripcion}}"><span
                                                class="fa fa-pencil"></span>
                                        </button>

                                        <a href="{{route('parametricas_listado.edit',$l->pk_id_parametrica_descripcion)}}" class="btn btn-raised btn-raised-danger rounded-circle btn-icon" data-toggle="tooltip" data-placement="top" title="Deshabilitar"
                                           onclick="return confirm('¿Esta seguro de Deshabilitar.?')"><span class="fa fa-arrows-rotate"></span> </a>
                                    @else
                                        <a href="{{route('parametricas_listado.edit',$l->pk_id_parametrica_descripcion)}}" class="btn btn-raised btn-raised-success rounded-circle btn-icon" data-toggle="tooltip" data-placement="top" title="Habilitar" onclick="return confirm('¿Esta seguro de Habilitar.?')"><span class="fa fa-arrows-rotate"></span> </a>
                                    @endif

                                <!-- Modal-->
                                    <div class="modal fade" id="addNewCardModal2{{$l->pk_id_parametrica_descripcion}}" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="card-title m-0" id="addNewCardModaltitle">Editar</p>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form role="form" method="post" class="form-horizontal needs-validation error" action="{{route('parametricas_listado.update',$l->pk_id_parametrica_descripcion)}}"
                                                          novalidate enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="alert alert-success" role="alert">Editar parametrica
                                                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="input-group with-icon input-light mb-3">
                                                            <div class="input-group-prepend">
                                                                <i class="input-group-text material-icons">edit_note</i>
                                                            </div>
                                                            <input type="text" class="form-control" name="descripcion" value="{{$l->descripcion}}" onchange="mayusculas(this)" required
                                                                   data-validation-required-message="Este campo es requerido">
                                                        </div>
                                                        <div class="input-group with-icon input-light mb-3">
                                                            <div class="input-group-prepend">
                                                                <i class="input-group-text material-icons">edit_note</i>
                                                            </div>
                                                            <input type="text" class="form-control" name="sigla" value="{{$l->sigla}}" onchange="mayusculas(this)" required
                                                                   data-validation-required-message="Este campo es requerido">
                                                        </div>

                                                        <div class="d-flex">
                                                            <div class="flex-grow-1"></div>
                                                            <button type="button" class="btn btn-opacity btn-danger mr-md" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addNewCardModal" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="card-title m-0" id="addNewCardModaltitle">Adicionar</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form role="form" method="post" class="form-horizontal needs-validation error" novalidate action="{{url('parametricas_listado')}}" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <input type="text" value="{{$pk_id_parametrica}}" name="pk_id_parametrica" hidden>
                        <div class="row">
                            <div class="col-md-12 mb-md">
                                <div class="control-group">
                                    <label for="exampleInputEmail1">Descripcion:</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Introduzca la nueva parametrica" onchange="mayusculas(this)" name="descripcion" required
                                               data-validation-required-message="Este campo es requerido"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-md">
                                <div class="control-group">
                                    <label for="exampleInputEmail1">Sigla:</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Introduzca la sigla" name="sigla" onchange="mayusculas(this)" required
                                               data-validation-required-message="Este campo es requerido"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div class="flex-grow-1"></div>
                            <button type="button" class="btn btn-opacity btn-danger mr-md" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>









@endsection
