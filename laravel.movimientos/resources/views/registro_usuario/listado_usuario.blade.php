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
                <h4 class="mb-0">Listado de Usuarios</h4>
            </div>

            <div class="card-body">
                <table id="tableDataUser" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Nivel</th>
                            <th>Rol</th>
                            <th style="width: 200px;">Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="contenido-user">
                        {{-- Aquí se cargarán los datos de usuarios dinámicamente --}}
                        @foreach ($listar_user as $index => $usuario)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->nivel }}</td>
                                <td>{{ $usuario->rol }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning btn-editar-usuario"
                                        data-id="{{ $usuario->id }}" data-nombre="{{ $usuario->name }}"
                                        data-correo="{{ $usuario->email }}" data-nivel="{{ $usuario->nivel }}"
                                        data-rol="{{ $usuario->rol }}" title="Editar">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>

                                    <a href="#" class="btn btn-sm btn-danger btn-eliminar-usuario"
                                        data-id="{{ $usuario->id }}" title="Eliminar">
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


    @include('registro_usuario.modal_usuario')
@endsection

<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>

<script>
    // Obtener la URL del socket desde el .env
    const SOCKET_URL = @json(env('SOCKET_URL', 'http://localhost:3001'));

    $(document).ready(function() {
        // Inicializa DataTable con idioma español
        const table = $('#tableDataUser').DataTable({
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

        // Escucha el evento para actualizar la tabla
        socket.on('listado_usuarios', function(data) {
            table.clear();

            console.log('Data Usuario', data);


            data.forEach(function(item, index) {
                const editarBtn = `
                    <a href="#" class="btn btn-sm btn-warning btn-editar-usuario"
                        data-id="${item.id}"
                        data-nombre="${item.name}"
                        data-correo="${item.email}"
                        data-nivel="${item.nivel}"
                        data-rol="${item.rol}"
                        data-tipo_ficha="${item.tipo_ficha}"
                        data-oaci="${item.oaci}"
                        title="Editar">
                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                    </a>`;

                const eliminarBtn = `
                    <a href="#" class="btn btn-sm btn-danger btn-eliminar-usuario"
                        data-id="${item.id}" title="Eliminar">
                        <i class="fa-solid fa-trash fa-lg"></i>
                    </a>`;

                table.row.add([
                    index + 1,
                    item.name,
                    item.email,
                    item.nivel,
                    item.rol,
                    editarBtn + ' ' + eliminarBtn
                ]);
            });

            table.draw();
        });

        // Manejo de errores de conexión
        socket.on('connect_error', function(err) {
            console.warn('Error al conectar con el socket:', err.message);
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Mostrar u ocultar el bloque de ficha/aeropuerto según el rol
        function toggleFichaAeropuertoBlock(rolNivel) {
            if (rolNivel == 13) {
                $('#ficha_aeropuerto_block').slideDown();
            } else {
                $('#ficha_aeropuerto_block').slideUp();
            }
        }

        // Evento clic en botón editar usuario
        $(document).on('click', '.btn-editar-usuario', function(e) {
            e.preventDefault();

            const button = $(this);

            // Abre el modal
            $('#addNewCardModalUsuario').modal('show');

            // Rellena los campos del formulario
            $('#usuario_id').val(button.data('id'));
            $('#usuario').val(button.data('nombre'));
            $('#email').val(button.data('correo'));

            $('#rol').val(button.data('nivel')).trigger('change');
            $('#tipo_ficha').val(button.data('tipo_ficha')).trigger('change');
            $('#oaci').val(button.data('oaci')).trigger('change');

            // Mostrar u ocultar el bloque si el rol es 13
            toggleFichaAeropuertoBlock(button.data('nivel'));
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('#rol').on('change', function() {
            if ($(this).val() === '13') {
                $('#ficha_aeropuerto_block').show();
            } else {
                $('#ficha_aeropuerto_block').hide();
            }
        });
    });
</script>

<script>
    $(document).on('click', '.btn-eliminar-usuario', function(e) {
        e.preventDefault();

        const button = $(this);
        const id = button.data('id');
        if (!id) return;

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción eliminará el usuario y no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/usuario/baja/${id}`,
                    type: 'GET',
                    success: function(response) {
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: response.success ??
                                "El usuario fue eliminado correctamente.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        const row = button.closest('tr');
                        $('#aeropuertoDataUser').DataTable().row(row).remove().draw(false);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo eliminar el usuario.",
                            icon: "error"
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
