@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item"><a href="{{ url('#') }}">Aeropuerto</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <button class="btn btn-twitter" data-toggle="modal" data-target="#addNewCardModalAeropuerto">
            <i class="fa-solid fa-plus"></i>Nuevo Aeropuerto</button>

        <div class="card-body">
            <table id="aeropuertoDataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Código OACI</th>
                        <th>Categoría</th>
                        <th>Ciudad</th>
                        <th style="width: 200px;">Acciones</th>
                    </tr>
                </thead>

                <tbody id="contenido-sobrevuelo">

                </tbody>
            </table>
        </div>
    </div>

    @include('aeropuerto.modal_aeropuerto')
@endsection

<script>
    $(document).ready(function() {
        $('#aeropuertoDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/aeropuerto/data') }}", // Ajusta esta ruta según tu backend
            pageLength: 25,
            columns: [{
                    data: null,
                    name: 'rownum',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'nombre',
                    name: 'nombre',
                    render: function(data, type, row) {
                        return data ? data.toUpperCase() : '';
                    }
                },
                {
                    data: 'cd_oaci',
                    name: 'codigo_oaci'
                },
                {
                    data: 'categoria',
                    name: 'categoria'
                },
                {
                    data: 'ciudad',
                    name: 'ciudad'
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        const editarBtn = `
                            <a href="#" class="btn btn-sm btn-primary btn-editar-aeropuerto"
                                data-id="${row.id}"
                                data-index="${meta.row + 1}"
                                data-nombre="${row.nombre || ''}"
                                data-codigo_oaci="${row.cd_oaci || ''}"
                                data-categoria="${row.categoria || ''}"
                                data-ciudad="${row.ciudad || ''}"
                                title="Editar">
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                            </a>`;

                        const eliminarBtn = `
                            <a href="#" class="btn btn-sm btn-danger btn-eliminar-aeropuerto"
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
        $(document).on('click', '.btn-editar-aeropuerto', function(e) {
            e.preventDefault();

            const button = $(this);

            // Abre el modal de edición
            $('#addNewCardModalAeropuerto').modal('show');

            // Llena los campos del formulario
            $('#aeropuerto_id').val(button.data('id'));
            $('#nombre').val(button.data('nombre'));
            $('#cd_oaci').val(button.data('codigo_oaci'));
            $('#categoria').val(button.data('categoria')).trigger('change');
            $('#ciudad').val(button.data('ciudad'));
        });
    });
</script>

<script>
    $(document).on('click', '.btn-eliminar-aeropuerto', function(e) {
        e.preventDefault();

        const button = $(this);
        const id = button.data('id');
        if (!id) return;

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción eliminará el aeropuerto y no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/aeropuerto/baja/${id}`,
                    type: 'GET',
                    success: function(response) {
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: response.success ??
                                "El aeropuerto fue eliminado correctamente.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Actualizar la Tabla
                        $('#aeropuertoDataTable').DataTable().ajax.reload(null, false);

                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo eliminar el aeropuerto.",
                            icon: "error"
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
