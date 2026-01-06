@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{url('home')}}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Administrador Regional</li>
@endsection

@section('content')


    <div class="container my-lg">
        <h2 class="doc-section-title" id="examples">Administrador Regional<a class="section-link"></a></h2>
        <div class="doc-example">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" method="post" action="{{url('registro_regional')}}" id="ValidarModal" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-5 mb-md">
                                <div class="control-group ">
                                    <label for="exampleFormControlInput1">Nombre Completo:</label>
                                    <select class="select2basico" name="name2" id="name2">
                                        <option value="">Seleccionar</option>
                                        @foreach($response as $r)
                                            <option value="{{$r->email}}">{{$r->name}} Regional: {{$r->regional}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="name" id="name" onchange="mayusculas(this)" autocomplete="off"/>

                        <div class="row">
                            <div class="col-md-12 mb-md">
                                <div class="control-group ">
                                    <div class="controls">
                                        <label for="exampleInputEmail1">Correo:</label>
                                        <input type="email" class="form-control" name="email" id="email" onchange="minusculas(this)" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-md">
                                <div class="control-group ">
                                    <label for="exampleFormControlInput1">Regional:</label>
                                    <select class="select2basico" name="fkp_regional" id="fkp_regional" onchange="habilitar(this.value);">
                                        <option value="">Seleccionar</option>
                                        @foreach($listar_regionales as $l)
                                            <option value="{{$l->pk_id_parametrica_descripcion}}">{{$l->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-raised-primary"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(function () {
            $(document).on('change', '#name2', function () {
                var tagOption = $('option:selected', this);
                $('#email').val(tagOption.val());
                $('#name').val(tagOption.text());
            });
        });
    </script>

    <script>
        $(function () {
            $("#ValidarModal").validate({
                rules: {
                    name: {
                        required: true,
                        noSpace: true,
                    },
                    fkp_regional: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Introduzca nombre completo",
                    },
                    fkp_regional: {
                        required: "[ Seleccione Regional ]",
                    },
                },
            });
        });
    </script>

@endsection
