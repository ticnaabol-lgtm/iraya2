/**
 * Configura un socket para manejar DataTables desde cualquier tabla.
 *
 * @param {Socket} socket - El socket conectado.
 * @param {Object} options - Configuración personalizada.
 * @param {string} options.eventIn - Nombre del evento a escuchar (desde el cliente).
 * @param {string} options.eventOut - Nombre del evento a emitir (hacia el cliente).
 * @param {string} options.table - Nombre de la tabla.
 * @param {string[]} options.searchFields - Campos a incluir en búsqueda global.
 */

function configurarConsultaPaginada(socket, { eventIn, eventOut, table, searchFields }) {
    socket.on(eventIn, async (params) => {
        const start = parseInt(params.start) || 0;
        const length = parseInt(params.length) || 10;
        const search = params.search?.value?.toLowerCase() || '';

        try {
            let baseQuery = `FROM ${table} WHERE activo = 1`;
            let values = [];
            let whereSearch = '';

            if (search && searchFields.length > 0) {
                const condiciones = searchFields.map((campo, i) => `LOWER(${campo}) LIKE $1`).join(' OR ');
                whereSearch = ` AND (${condiciones})`;
                values.push(`%${search}%`);
            }

            const totalResult = await pool.query(`SELECT COUNT(*) ${baseQuery}`);
            const recordsTotal = parseInt(totalResult.rows[0].count);

            const filteredResult = await pool.query(`SELECT COUNT(*) ${baseQuery + whereSearch}`, values);
            const recordsFiltered = parseInt(filteredResult.rows[0].count);

            // Data paginada
            values.push(length, start);
            const dataQuery = `
                SELECT * ${baseQuery + whereSearch}
                ORDER BY id DESC LIMIT $${values.length - 1} OFFSET $${values.length}
            `;
            const dataResult = await pool.query(dataQuery, values);

            socket.emit(eventOut, {
                draw: params.draw,
                recordsTotal,
                recordsFiltered,
                data: dataResult.rows
            });
        } catch (error) {
            console.error(`Error en ${eventIn}:`, error);
        }
    });
}

const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const { Pool } = require('pg');
const cors = require('cors');
const app = express();
app.use(cors());
const server = http.createServer(app);
const io = new Server(server, {
    cors: {
        origin: ["http://10.5.4.106:8003", "http://localhost:8003"],
        //origin: ["http://10.100.12.249:3333", "http://localhost:3333"],
        methods: ["GET", "POST"],
        allowedHeaders: ["Content-Type"],
        credentials: true
    },
    transports: ['websocket', 'polling'] // Asegurar ambos transportes
});

// Conexión PostgreSQL [CAMBIAR CON TUS DATOS DE CONEXION]
const pool = new Pool({
    user: 'root',
    host: '10.5.4.106',
    database: 'bd_mov_trans_parametrica',
    password: 't3mp0r4l',
    port: 5432,
});

// Intervalo para emitir datos
setInterval(async () => {
    try {

        // Emitir todos los registros sobrevuelos activos 
        /* const result3 = await pool.query(
            'SELECT * FROM registro_adicion_sobrevuelo WHERE activo = 1 ORDER BY id DESC'
        );
        io.emit('amhs_actualizado', result3.rows); */

        // Emitir todos los registros matricula activos 
        /* const result5 = await pool.query(
            'SELECT * FROM registro_matricula WHERE activo = 1 ORDER BY id DESC'
        );
        io.emit('registro_matricula', result5.rows); */

        // Emitir todos los registros cliente activos 
        /* const result6 = await pool.query(
            'SELECT * FROM registro_cliente WHERE activo = 1 ORDER BY id DESC'
        );
        io.emit('registro_cliente', result6.rows); */

        // Emitir todos los registros aeropuertos activos 
        /* const result7 = await pool.query(
            'SELECT * FROM aeropuertos WHERE activo = 1 ORDER BY id DESC'
        );
        io.emit('registro_aeropuertos', result7.rows); */

        // Emitir todos los registros aeropuertos activos 
        /* const result8 = await pool.query(
            'SELECT * FROM registro_autorizacion WHERE activo = 1 ORDER BY id DESC'
        );
        io.emit('registro_autorizacion', result8.rows); */

        // Emitir todos los usuarios
        /* const result9 = await pool.query(
            'SELECT * FROM vista_usuarios WHERE activo = 1 ORDER BY nivel DESC'
        );
        io.emit('listado_usuarios', result9.rows); */

        // Emitir todos los roles de usuarios
        /* const result10 = await pool.query(
            'SELECT pk_id_parametrica_descripcion, descripcion, rol_nivel FROM parametrica_descripcions WHERE activo = 1 AND rol_nivel != 0'
        );
        io.emit('listado_roles', result10.rows); */

        // Emitir todos los registros sobrevuelos aprobados o rechazados y no leidos
        /* const result2 = await pool.query(
            'SELECT * FROM registro_adicion_sobrevuelo  WHERE activo = 1 AND aprobado IN (1, 2) AND leido = 0 ORDER BY id DESC;'
        );
        io.emit('amhs_aprobado', result2.rows); */

        // Emitir la cantidad de registros sobrevuelos aprobados o rechazados y no leidos
        const result = await pool.query(`
                SELECT id, fecha, cliente, matricula, aprobado
                FROM registro_adicion_sobrevuelo
                WHERE activo = 1 AND aprobado IN (1, 2) AND leido = 0
            `);

        const count = result.rowCount;
        const registros = result.rows;

        io.emit('amhs_no_leidos', {
            count: count,
            registros: registros
        });

        // Emitir la cantidad de registros sobrevuelos pendientes o corregidos
        const result4 = await pool.query(`
                SELECT id, fecha, cliente, matricula, aprobado
                FROM registro_adicion_sobrevuelo
                WHERE activo = 1 AND aprobado IN (0, 3) AND leido = 0
            `);

        const count4 = result4.rowCount;
        const registros4 = result4.rows;

        io.emit('amhs_por_aprobar', {
            count: count4,
            registros: registros4
        });


    } catch (err) {
        console.error('Error en el query:', err);
    }
}, 30000); // cada 5 segundos 5000

// Evento de conexión
io.on('connection', (socket) => {
    console.log('Cliente conectado');
});

server.listen(3001, () => {
    console.log('Socket.IO corriendo en http://localhost:3001');
});