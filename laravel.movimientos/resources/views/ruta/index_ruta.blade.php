@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item"><a href="{{ url('#') }}">Ruta DCT</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <button class="btn btn-twitter" data-toggle="modal" data-target="#addNewCardModalRuta">
            <i class="fa-solid fa-plus"></i>Nueva Ruta DCT</button>

        <div class="card-body">
            <table id="rutaDataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ruta DCT</th>
                        <th>Distancia (NM)</th>
                        <th style="width: 200px;">Acciones</th>
                    </tr>
                </thead>

                <tbody id="contenido-sobrevuelo">

                </tbody>
            </table>
        </div>
    </div>

    @include('ruta.modal_ruta')
@endsection

<script>
    $(document).ready(function() {
        $('#rutaDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/ruta/data') }}",
            pageLength: 25,
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'ruta',
                    name: 'ruta',
                    render: function(data, type, row) {
                        return data ? data.toUpperCase() : '';
                    }
                },
                {
                    data: 'distancia',
                    name: 'distancia',
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        const editarBtn = `
                            <a href="#" class="btn btn-sm btn-primary btn-editar-ruta-dct"
                                data-id="${row.id}"
                                data-ruta="${row.ruta || ''}"
                                data-distancia="${row.distancia || ''}"
                                title="Editar">
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                            </a>`;

                        const eliminarBtn = `
                            <a href="#" class="btn btn-sm btn-danger btn-eliminar-ruta-dct"
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
        // Evento clic en botón editar aeropuerto
        $(document).on('click', '.btn-editar-ruta-dct', function(e) {
            e.preventDefault();

            const button = $(this);

            // Abre el modal de edición
            $('#addNewCardModalRuta').modal('show');

            // Llena los campos del formulario
            $('#ruta_id').val(button.data('id'));
            $('#ruta').val(button.data('ruta'));
            $('#distancia').val(button.data('distancia'));
        });
    });
</script>

<script>
    $(document).on('click', '.btn-eliminar-ruta-dct', function(e) {
        e.preventDefault();

        const button = $(this);
        const id = button.data('id');
        if (!id) return;

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción eliminará la Ruta DCT y no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/ruta/baja/${id}`,
                    type: 'GET',
                    success: function(response) {
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: response.success ??
                                "La Ruta DCT fue eliminada correctamente.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Actualizar la Tabla
                        $('#rutaDataTable').DataTable().ajax.reload(null, false);

                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo eliminar la Ruta DCT.",
                            icon: "error"
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
