@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Listado de Roles</h4>
            </div>

            <div class="card-body">

                <button class="btn btn-twitter" data-toggle="modal" data-target="#addNewCardModalRol">
                    <i class="fa-solid fa-plus"></i>Nuevo</button>

                <br /><br />

                <table id="tableDataRol" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rol</th>
                            <th>Nivel</th>
                            <th style="width: 200px;">Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="contenido-rol">
                        {{-- Aquí se cargarán los datos de roles dinámicamente --}}
                        @foreach ($roles as $index => $rol)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $rol->descripcion }}</td>
                                <td>{{ $rol->rol_nivel }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning btn-editar-rol"
                                        data-id="{{ $rol->pk_id_parametrica_descripcion }}"
                                        data-rol="{{ $rol->descripcion }}" data-nivel="{{ $rol->rol_nivel }}"
                                        title="Editar">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>

                                    <a href="#" class="btn btn-sm btn-danger btn-eliminar-rol"
                                        data-id="{{ $rol->pk_id_parametrica_descripcion }}" title="Eliminar">
                                        <i class="fa-solid fa-trash fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


    @include('registro_usuario.modal_rol')
@endsection

<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>

<script>
    // Obtener la URL del socket desde el .env
    const SOCKET_URL = @json(env('SOCKET_URL', 'http://localhost:3001'));

    $(document).ready(function() {
        // Inicializa DataTable con idioma español para roles
        const table = $('#tableDataRol').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            },
            columnDefs: [{
                targets: -1,
                orderable: false,
                searchable: false
            }]
        });

        // Conecta con el servidor socket
        const socket = io(SOCKET_URL, {
            transports: ['websocket'],
            reconnectionAttempts: 5
        });

        // Escucha el evento del socket para listado de roles
        socket.on('listado_roles', function(data) {
            table.clear();

            console.log('Data Rol', data);

            data.forEach(function(item, index) {
                const editarBtn = `
                    <a href="#" class="btn btn-sm btn-warning btn-editar-rol"
                        data-id="${item.pk_id_parametrica_descripcion}"
                        data-rol="${item.descripcion}"
                        data-nivel="${item.rol_nivel}"
                        title="Editar">
                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                    </a>`;

                const eliminarBtn = `
                    <a href="#" class="btn btn-sm btn-danger btn-eliminar-rol"
                        data-id="${item.pk_id_parametrica_descripcion}"
                        title="Eliminar">
                        <i class="fa-solid fa-trash fa-lg"></i>
                    </a>`;

                table.row.add([
                    index + 1,
                    item.descripcion,
                    item.rol_nivel,
                    editarBtn + ' ' + eliminarBtn
                ]);
            });

            table.draw();
        });

        // Manejo de error de conexión
        socket.on('connect_error', function(err) {
            console.warn('Error al conectar con el socket:', err.message);
        });
    });
</script>

<script>
    $(document).ready(function() {

        // Evento clic en botón editar rol
        $(document).on('click', '.btn-editar-rol', function(e) {
            e.preventDefault();

            const button = $(this);

            // Abre el modal
            $('#addNewCardModalRol').modal('show');

            // Rellena los campos del formulario
            $('#rol_id').val(button.data('id'));
            $('#rol').val(button.data('rol')).trigger('input');

        });

    });
</script>

<script>
    $(document).on('click', '.btn-eliminar-rol', function(e) {
        e.preventDefault();

        const button = $(this);
        const id = button.data('id');
        if (!id) return;

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción eliminará el rol y no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/rol/baja/${id}`,
                    type: 'GET',
                    success: function(response) {
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: response.success ??
                                "El rol fue eliminado correctamente.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        const row = button.closest('tr');
                        $('#tablaListadoRoles').DataTable().row(row).remove().draw(false);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo eliminar el rol.",
                            icon: "error"
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
