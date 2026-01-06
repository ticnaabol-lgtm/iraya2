// cerrar.js
const { Pool } = require('pg');

// Configuración de la conexión
const pool = new Pool({
    host: '10.5.4.106',
    port: 5432,
    database: 'bd_mov_trans_parametrica',
    user: 'root',
    password: 't3mp0r4l'
});

// Función principal que consulta y actualiza
async function consultarProcesoVuelo() {
    const client = await pool.connect();

    try {
        // Obtener fecha y hora actual en UTC
        const fechaHoraUTC = new Date().toUTCString();
        const ahoraUTC = new Date(); // Para cálculos
        console.log('\n=== Ejecutando consulta - Fecha y hora actual (UTC):', fechaHoraUTC);

        const query = 'SELECT * FROM proceso_vuelo WHERE id_estado = $1 AND activo = $2 AND cerrado = $3 ORDER BY id DESC';
        const result = await client.query(query, ['4', 1, 0]);

        console.log(`Registros encontrados: ${result.rowCount}`);

        let contadorActualizados = 0;

        // Procesar cada registro
        for (const proceso of result.rows) {
            // Usar fecha_impresion si no es null, de lo contrario usar updated_at
            const fechaReferencia = proceso.fecha_impresion !== null
                ? proceso.fecha_impresion
                : proceso.updated_at;

            if (fechaReferencia !== null) {
                const fecha = new Date(fechaReferencia);

                // Calcular diferencia en milisegundos
                const diferenciaMs = ahoraUTC.getTime() - fecha.getTime();

                // Convertir a horas (1 hora = 3600000 ms)
                const diferenciaHoras = diferenciaMs / (1000 * 60 * 60);

                // Si la diferencia es más de 4 horas
                if (diferenciaHoras > 4) {
                    // Hacer update cerrado = 1
                    const updateQuery = 'UPDATE proceso_vuelo SET cerrado = 1 WHERE id = $1';
                    await client.query(updateQuery, [proceso.id]);
                    contadorActualizados++;
                    console.log(`Actualizado cerrado = 1 para id: ${proceso.id} (Diferencia: ${diferenciaHoras.toFixed(2)} horas)`);
                }
            }
        }

        console.log(`Total actualizados: ${contadorActualizados}`);

        return result.rows;
    } catch (error) {
        console.error('Error:', error.message);
    } finally {
        client.release(); // Solo liberar el cliente, NO cerrar el pool
    }
}

// Configurar intervalo para ejecutar cada minuto (60000 ms = 1 minuto) (3600000 ms = 1 hora)
setInterval(async () => {
    await consultarProcesoVuelo();
}, 3600000);

// Ejecutar inmediatamente la primera vez
consultarProcesoVuelo();

// Función para limpiar recursos al salir
process.on('SIGINT', async () => {
    console.log('\nDeteniendo proceso y cerrando pool...');
    await pool.end();
    process.exit(0);
});

process.on('SIGTERM', async () => {
    console.log('\nDeteniendo proceso y cerrando pool...');
    await pool.end();
    process.exit(0);
});