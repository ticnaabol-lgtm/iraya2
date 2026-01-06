@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item"><a href="{{ url('#') }}">Matrícula</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <button class="btn btn-twitter" data-toggle="modal" data-target="#addNewCardModalMatricula">
            <i class="fa-solid fa-plus"></i>Nueva Matrícula</button>

        <div class="card-body">
            <table id="matriculaDataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Matrícula</th>
                        <th>Fabricante</th>
                        <th>Modelo</th>
                        <th>Versión</th>
                        <th>Peso</th>
                        <th>Dimensión</th>
                        <th>Peso Toneladas</th>
                        <th style="width: 200px;">Acciones</th>
                    </tr>
                </thead>

                <tbody id="contenido-matricula">

                </tbody>
            </table>
        </div>
    </div>

    @include('matricula.modal_matricula')
@endsection

<script>
    $(document).ready(function() {
        $('#matriculaDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/matricula/data') }}",
            pageLength: 25,
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'matricula',
                    name: 'matricula'
                },
                {
                    data: 'fabricante',
                    name: 'fabricante'
                },
                {
                    data: 'modelo',
                    name: 'modelo'
                },
                {
                    data: 'version',
                    name: 'version'
                },
                {
                    data: 'peso',
                    name: 'peso'
                },
                {
                    data: 'medida_peso',
                    name: 'dimension'
                },
                {
                    data: 'peso_toneladas',
                    name: 'peso_toneladas'
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        const editarBtn = `
                                <a href="#" class="btn btn-sm btn-primary btn-editar-matricula"
                                    data-id="${row.id}"
                                    data-index="${meta.row + 1}"
                                    data-matricula="${row.matricula || ''}"
                                    data-fabricante="${row.fabricante || ''}"
                                    data-modelo="${row.modelo || ''}"
                                    data-version="${row.version || ''}"
                                    data-peso="${row.peso || ''}"
                                    data-medida_peso="${row.medida_peso || ''}"
                                    data-peso_toneladas="${row.peso_toneladas || ''}"
                                    title="Editar">
                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                </a>`;

                        const eliminarBtn = `
                                <a href="#" class="btn btn-sm btn-danger btn-eliminar-matricula"
                                    data-id="${row.id}" title="Eliminar">
                                    <i class="fa-solid fa-trash fa-lg"></i>
                                </a>`;

                        return editarBtn + ' ' + eliminarBtn;
                    }
                },
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": activar para ordenar la columna ascendente",
                    "sortDescending": ": activar para ordenar la columna descendente"
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Evento clic en botón editar matrícula
        $(document).on('click', '.btn-editar-matricula', function(e) {
            e.preventDefault();

            const button = $(this);

            // Abre el modal
            $('#addNewCardModalMatricula').modal('show');

            // Llena los campos del formulario
            $('#matricula_id').val(button.data('id'));
            $('#matricula').val(button.data('matricula'));
            $('#fabricante').val(button.data('fabricante'));
            $('#modelo').val(button.data('modelo'));
            $('#version').val(button.data('version'));
            $('#peso').val(button.data('peso'));
            $('#medida_peso').val(button.data('medida_peso'));

            // Opcional: si tienes un campo oculto o visible para peso_toneladas
            if ($('#peso_toneladas').length) {
                $('#peso_toneladas').val(button.data('peso_toneladas'));
            }
        });
    });
</script>

<script>
    $(document).on('click', '.btn-eliminar-matricula', function(e) {
        e.preventDefault();

        const button = $(this);
        const id = button.data('id');
        if (!id) return;

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción eliminará la matrícula y no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/matricula/baja/${id}`,
                    type: 'GET',
                    success: function(response) {
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: response.success ??
                                "La matrícula fue eliminada correctamente.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Actualizar la Tabla
                        $('#matriculaDataTable').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo eliminar la matrícula.",
                            icon: "error"
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
