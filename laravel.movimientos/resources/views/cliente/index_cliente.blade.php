@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item"><a href="{{ url('#') }}">Cliente</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <button class="btn btn-twitter" data-toggle="modal" data-target="#addNewCardModalCliente">
            <i class="fa-solid fa-plus"></i>Nuevo Cliente</button>

        <div class="card-body">
            <table id="clienteDataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Codigo OACI</th>
                        <th>Codigo Contable</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Pais</th>
                        <th style="width: 200px;">Acciones</th>
                    </tr>
                </thead>

                <tbody id="contenido-matricula">

                </tbody>
            </table>

        </div>
    </div>

    @include('cliente.modal_cliente')
@endsection

<script>
    $(document).ready(function() {
        $('#clienteDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/cliente/data') }}",
            pageLength: 25,
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'codigo_oaci',
                    name: 'codigo_oaci'
                },
                {
                    data: 'codigo_contable',
                    name: 'codigo_contable'
                },
                {
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'telefono',
                    name: 'telefono'
                },
                {
                    data: 'email',
                    name: 'correo'
                },
                {
                    data: 'pais',
                    name: 'pais'
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        const editarBtn = `
                            <a href="#" class="btn btn-sm btn-primary btn-editar-cliente"
                                data-id="${row.id}"
                                data-codigo_oaci="${row.codigo_oaci || ''}"
                                data-codigo_contable="${row.codigo_contable || ''}"
                                data-nombre="${row.nombre || ''}"
                                data-direccion="${row.direccion || ''}"
                                data-fax="${row.fax || ''}"
                                data-casilla="${row.casilla || ''}"
                                data-telefono="${row.telefono || ''}"
                                data-email="${row.email || ''}"
                                data-pais="${row.pais || ''}"
                                data-ciudad="${row.ciudad || ''}"
                                data-nit="${row.nit || ''}"
                                data-representante="${row.representante || ''}"
                                title="Editar">
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                            </a>`;

                        const eliminarBtn = `
                            <a href="#" class="btn btn-sm btn-danger btn-eliminar-cliente"
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
        // Evento clic en botón editar cliente
        $(document).on('click', '.btn-editar-cliente', function(e) {
            e.preventDefault();

            const button = $(this);

            // Abre el modal de edición
            $('#addNewCardModalCliente').modal('show');

            // Llena los campos del formulario
            $('#cliente_id').val(button.data('id'));
            $('#codigo_oaci').val(button.data('codigo_oaci'));
            $('#codigo_contable').val(button.data('codigo_contable'));
            $('#nombre').val(button.data('nombre'));
            $('#direccion').val(button.data('direccion'));
            $('#telefono').val(button.data('telefono'));
            $('#fax').val(button.data('fax'));
            $('#casilla').val(button.data('casilla'));
            $('#email').val(button.data('email'));
            $('#representante').val(button.data('representante'));
            $('#pais').val(button.data('pais')).trigger('change');
            $('#ciudad').val(button.data('ciudad'));
            $('#nit').val(button.data('nit'));
        });
    });
</script>

<script>
    $(document).on('click', '.btn-eliminar-cliente', function(e) {
        e.preventDefault();

        const button = $(this);
        const id = button.data('id');
        if (!id) return;

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción eliminará el cliente y no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/cliente/baja/${id}`, // Asegúrate de que esta ruta exista y funcione
                    type: 'GET',
                    success: function(response) {
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: response.success ??
                                "El cliente fue eliminado correctamente.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Actualizar la Tabla
                        $('#clienteDataTable').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo eliminar el cliente.",
                            icon: "error"
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
