@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{url('home')}}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listado de Materiales</li>
@endsection

@section('content')



    <div class="row">
        <div class="col-lg-12">
            <div class="card-header">
                <h2 class="p-1 m-0 text-16 font-weight-semi">Listado de Materiales</h2>

                <button class="btn btn-raised btn-raised-primary" data-toggle="modal" data-target="#addNewProvider">
                    <span class="fa fa-plus-circle"></span> Adicionar
                </button>

                <a href="{{ url('parametricas_listado',$fk_id_parametrica) }}" class="btn btn-raised"><span class="fa fa-arrow-left"></span>
                    Salir</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="basicDatatable" class="table" style="width:100%">
                        <thead>
                        <tr style="text-align: center">
                            <th>Descripcion</th>
                            <th>Sigla</th>
                            <th>activo</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($listar_materiales as $l)
                            <tr>
                                <td>{{$l->descripcion}}</td>
                                <td>{{$l->sigla}}</td>
                                <td>
                                    @if($l->activo == '1')
                                        <p>Habilitado</p>
                                    @else
                                        <b style="color: red">Deshabilitado</b>
                                    @endif
                                </td>

                                <td style="width: 150px">
                                    @if($l->activo == '1')
                                        <button class="btn btn-raised btn-raised-success btn-sm btn-block mb-2" data-toggle="modal" data-target="#edit{{ $l->pk_id_parametrica_material }}">
                                            <span class="fa fa-pen"></span> Editar
                                        </button>
                                        <div class="modal fade" id="edit{{ $l->pk_id_parametrica_material }}" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p class="card-title m-0" id="addNewCardModaltitle">Editar</p>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form role="form" method="post" id="ValidarModalEdit" action="{{route('parametricas_materiales.update',$l->pk_id_parametrica_material)}}"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="alert alert-success" role="alert"><span class="fa fa-warning"></span> Editar la descripción del material.
                                                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"></button>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 mb-md">
                                                                    <div class="control-group ">
                                                                        <label for="exampleFormControlInput1">Descripción:</label>
                                                                        <textarea rows="2" class="form-control" name="descripcion" onchange="mayusculas(this)" placeholder="Introduzca Descripción"
                                                                                  required> {{$l->descripcion}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 mb-md">
                                                                    <div class="control-group ">
                                                                        <label for="exampleFormControlInput1">Sigla:</label>
                                                                        <input type="text" class="form-control" name="sigla" placeholder="Introduzca Sigla" value="{{$l->sigla}}" required onchange="mayusculas(this)">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex">
                                                                <div class="flex-grow-1"></div>
                                                                <button type="button" class="btn btn-opacity btn-danger mr-md" data-dismiss="modal">Cancelar
                                                                </button>
                                                                <button type="submit" class="btn btn-flat btn-primary">Guardar
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{route('parametricas_materiales.edit',$l->pk_id_parametrica_material)}}" class="btn btn-raised-danger btn-sm btn-block" onclick="return confirm('¿Esta seguro de Deshabilitar.?')">
                                            <span class="fa fa-close"></span> Deshabilitar
                                        </a>
                                    @else
                                        <a href="{{route('parametricas_materiales.edit',$l->pk_id_parametrica_material)}}" class="btn btn-raised-warning btn-sm btn-block" onclick="return confirm('¿Esta seguro de Habilitar.?')">
                                            <span class="fa fa-close"></span> Habilitar
                                        </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--Ventana Modal--}}
    <div class="modal fade" id="addNewProvider" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="card-title m-0" id="addNewCardModaltitle">Adicionar</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form role="form" method="post" id="ValidarModal" action="{{url('parametricas_materiales')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="alert alert-primary" role="alert"><span class="fa fa-warning"></span> Adicionar la descripción del material.
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <input type="hidden" name="pk_id_parametrica_descripcion" value="{{$pk_id_parametrica_descripcion}}">

                        <div class="row">
                            <div class="col-md-12 mb-md">
                                <div class="control-group ">
                                    <label for="exampleFormControlInput1">Descripción:</label>
                                    <textarea rows="2" class="form-control" name="descripcion" onchange="mayusculas(this)" placeholder="Introduzca Descripción" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-md">
                                <div class="control-group ">
                                    <label for="exampleFormControlInput1">Sigla:</label>
                                    <input type="text" class="form-control" name="sigla" placeholder="Introduzca Sigla" value="-" required onchange="mayusculas(this)">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="flex-grow-1"></div>
                            <button type="button" class="btn btn-opacity btn-danger mr-md" data-dismiss="modal">Cancelar
                            </button>
                            <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--Fin Ventana Modal--}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        $(function () {
            $("#ValidarModal").validate({
                rules: {
                    descripcion: {
                        required: true,
                        noSpace: true,
                    },
                    sigla: {
                        required: true,
                        noSpace: true,
                    },
                },
                messages: {
                    descripcion: {
                        required: "Introduzca descripción",
                    },
                    sigla: {
                        required: "Introduzca sigla",
                    },
                },
            });
        });
    </script>






@endsection
