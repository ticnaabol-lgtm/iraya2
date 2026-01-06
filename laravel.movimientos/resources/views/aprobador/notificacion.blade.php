<style>
    .notification-icon {
        position: relative;
        cursor: pointer;
    }

    .notification-badge {
        position: absolute;
        top: -6px;
        right: -6px;
        background-color: #ff3b3f;
        color: white;
        border-radius: 50%;
        padding: 3px 6px;
        font-size: 0.65rem;
        font-weight: bold;
    }

    /* Panel emergente ajustado mejor */
    .lista-sobrevuelos {
        display: none;
        position: absolute;
        top: 40px;
        right: 0;
        width: 250px;
        max-height: 500px;
        /* altura máxima visible */
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        border-radius: 8px;
        overflow-y: auto;
        /* scroll vertical */
        overflow-x: hidden;
        /* evita scroll horizontal */
        padding-right: 6px;
        /* para evitar que se corte el scrollbar */
    }

    .lista-sobrevuelos .item {
        padding: 10px;
        border-bottom: 1px solid #eee;
        font-size: 0.9rem;
    }

    .lista-sobrevuelos .item:last-child {
        border-bottom: none;
    }

    .lista-sobrevuelos .estado {
        font-weight: bold;
        display: block;
        margin-top: 4px;
    }

    .estado {
        font-weight: bold;
        padding: 2px 6px;
        border-radius: 4px;
        display: inline-block;
    }

    .estado.aprobado {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .estado.rechazado {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .estado.pendiente {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }

    .estado.corregido {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }
</style>

<!-- Campanita de notificacion -->
@if (Auth::user()->nivel == 14 || Auth::user()->nivel == 16)
    <div class="position-relative">
        <!-- Icono con llamada a toggleLista() -->
        <div class="notification-icon" onclick="toggleLista()">
            <i class="fas fa-bell fa-2x text-dark"></i>
            <span class="notification-badge"></span>
        </div>

        <!-- Lista simulada de sobrevuelos (oculta por defecto) -->
        <div id="listaSobrevuelos" class="lista-sobrevuelos"
            style="display: none; position: absolute; top: 40px; right: 0; background: white; border: 1px solid #ccc; padding: 10px; z-index: 999;">

            <div class="text-end mt-2">
                <button id="btnAceptarTodo" class="btn btn-opacity-warning" type="button" onclick="aceptarTodo()">
                    <i class="fas fa-check-circle"></i> Recibir Todo
                </button>
            </div>

            {{-- loading --}}
            <div id="loadingMensaje" class="text-center" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>

            <div id="contenidoSobrevuelos"></div>

        </div>
    </div>
@endif

<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>

<script>
    function marcarComoLeido(id) {
        const url = user.nivel === 14 ?
            '/registro/leidos_sobrevuelo' :
            '/aprobador/leidos_sobrevuelo';

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Marcado como leído:', response);
                $('#fila-sobrevuelo-' + id).remove();
            },
            error: function(xhr) {
                console.error('Error al marcar como leído:', xhr.responseText);
            }
        });
    }
</script>

<script>
    var user = @json([
        'id' => auth()->id(),
        'nivel' => auth()->user()->nivel,
    ]);

    //var socket = io("{{ env('SOCKET_URL') }}");

    var socket = io('{{ env('SOCKET_URL') }}', {
        withCredentials: true,
        reconnection: true,
        reconnectionAttempts: 5,
        reconnectionDelay: 1000,
        timeout: 20000,
        transports: ['websocket', 'polling'],
        upgrade: true
    });

    function procesarNotificaciones(data) {
        console.log("Cantidad no leídos:", data.count);
        console.log("Registros no leídos:", data.registros);

        const badge = document.querySelector('.notification-badge');
        if (badge) {
            badge.textContent = data.count;
        }

        const listaContenedor = document.querySelector('#listaSobrevuelos');
        const contenidoDinamico = document.querySelector('#contenidoSobrevuelos');

        if (!listaContenedor) return;

        /* if (data.count === 0) {
            listaContenedor.style.display = 'none';
            listaContenedor.innerHTML = '';
            return;
        } */

        let html = '';
        data.registros.forEach(item => {
            let estadoClase = '';
            let estadoTexto = '';

            switch (item.aprobado) {
                case 1:
                    estadoClase = 'aprobado';
                    estadoTexto = 'APROBADO';
                    break;
                case 2:
                    estadoClase = 'rechazado';
                    estadoTexto = 'RECHAZADO';
                    break;
                case 3:
                    estadoClase = 'corregido';
                    estadoTexto = 'CORREGIDO';
                    break;
                case 0:
                    estadoClase = 'pendiente';
                    estadoTexto = 'PENDIENTE';
                    break;
            }

            const fechaFormateada = item.fecha.split('T')[0].split('-').reverse().join('/');

            html += `
                        <div id="fila-sobrevuelo-${item.id}" class="text-decoration-none text-dark" style="cursor:pointer;" onclick="marcarComoLeido(${item.id})">
                            <div class="item py-2 border-bottom">
                                <strong>Fecha:</strong> ${fechaFormateada} <br>
                                <strong>Cliente:</strong> ${item.cliente} <br>
                                <strong>Matrícula:</strong> ${item.matricula} <br>
                                <span class="estado ${estadoClase}">${estadoTexto}</span>
                            </div>
                        </div>
                    `;
        });

        contenidoDinamico.innerHTML = html;
        // listaContenedor.style.display = 'block';
    }

    // Asignar canal correspondiente según nivel
    if (user.nivel === 14) {
        socket.on('amhs_no_leidos', procesarNotificaciones);
    }

    if (user.nivel === 16) {
        socket.on('amhs_por_aprobar', procesarNotificaciones);
    }
</script>
<!-- JS para mostrar/ocultar lista -->
<script>
    function toggleLista() {
        const lista = document.getElementById('listaSobrevuelos');

        if (!lista) return;

        lista.style.display = (lista.style.display === 'none' || lista.style.display === '') ? 'block' : 'none';

    }

    // Cierra si se hace clic fuera del ícono y la lista
    document.addEventListener('click', function(e) {
        const icon = document.querySelector('.notification-icon');
        const lista = document.getElementById('listaSobrevuelos');

        if (icon && lista && !icon.contains(e.target) && !lista.contains(e.target)) {
            lista.style.display = 'none';
        }
    });
</script>

<script>
    function aceptarTodo() {
        const contenedor = document.getElementById("contenidoSobrevuelos");
        const elementos = contenedor.querySelectorAll("[id^='fila-sobrevuelo-']");
        const ids = [];

        // Mostrar mensaje de carga
        document.getElementById("loadingMensaje").style.display = "block";

        elementos.forEach(el => {
            const match = el.id.match(/^fila-sobrevuelo-(\d+)$/);
            if (match) {
                ids.push(parseInt(match[1]));
            }
        });

        if (ids.length === 0) {
            alert("No se encontraron registros para marcar como leídos.");
            return;
        }

        const ruta = (user.nivel === 14) ?
            "{{ route('registro.leidos_all') }}" :
            "{{ route('aprobador.leidos_all') }}";

        fetch(ruta, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    ids: ids
                })
            })
            .then(response => {
                if (!response.ok) throw new Error(`Error HTTP ${response.status}`);
                return response.json();
            })
            .then(data => {
                console.log(data.message ?? "Registros marcados como leídos.");
                // Ejemplo: marcar visualmente como leídos
                elementos.forEach(el => el.classList.add("text-muted"));
            })
            .catch(error => {
                console.error('Error al enviar:', error);
                alert("Error de comunicación con el servidor.");
            })
            .finally(() => {
                // Ocultar mensaje de carga
                document.getElementById("loadingMensaje").style.display = "none";
            });
    }
</script>
