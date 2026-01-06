<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resumen de Sobrevuelos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            height: 60px;
        }

        .titulo {
            text-align: center;
            margin-top: 10px;
        }

        .titulo h2 {
            font-size: 18px;
            margin: 10px 0 5px;
        }

        .titulo h3 {
            font-weight: normal;
            margin: 0;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 10px;
        }

        th {
            background-color: #eeeeee;
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('img/logo_naabol.png') }}" alt="Logo NAABOL">
        <div style="text-align: right; font-size: 12px;">
            Fecha y Hora: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}
        </div>
    </div>

    <div class="titulo">
        <h3>Centro Control de Área Regional La Paz</h3>
        <h3>Tránsito Aéreo NAABOL</h3>
        <br />
        <h2><strong>REPORTE DE OPERACIONES AÉREAS</strong></h2>
        <p>Rango de Fechas de {{ \Carbon\Carbon::parse($desde)->format('d/m/Y') }} al
            {{ \Carbon\Carbon::parse($hasta)->format('d/m/Y') }}</p>
        <p><strong>Estado:</strong> {{ ucfirst($estado) }}</p>
        <p><strong>Cliente:</strong> {{ $clienteNombre }}</p>
    </div>

    {{-- <h2>Resumen de Sobrevuelos</h2>
    <p><strong>De:</strong> {{ $desde }} &nbsp;&nbsp;&nbsp; <strong>Hasta:</strong> {{ $hasta }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($estado) }}</p> --}}

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>FECHA</th>
                <th>CLIENTE</th>
                <th>MATRÍCULA</th>
                <th>MODELO</th>
                <th>MTOW-TON</th>
                <th>VUELO</th>
                <th>ORIGEN</th>
                <th>DESTINO</th>
                <th>HR INGRESO</th>
                <th>HR SALIDA</th>
                <th>RUTA</th>
                <th>NUM DGAC</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosArray as $fila)
                <tr>
                    <td>{{ $fila['nro'] }}</td>
                    <td>{{ $fila['fecha'] }}</td>
                    <td>{{ $fila['cliente'] }}</td>
                    <td>{{ $fila['matricula'] }}</td>
                    <td>{{ $fila['modelo'] }}</td>
                    <td>{{ $fila['peso'] }}</td>
                    <td>{{ $fila['vuelo'] }}</td>
                    <td>{{ $fila['origen'] }}</td>
                    <td>{{ $fila['destino'] }}</td>
                    <td>{{ $fila['hr_in'] }}</td>
                    <td>{{ $fila['hr_sa'] }}</td>
                    <td>{{ $fila['ruta'] }}</td>
                    <td>{{ $fila['num_dgac'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br><br><br>

    <br><br><br>
    <div style="text-align: center; margin-top: 50px;">
        <hr style="width: 250px; margin: 0 auto;">
        <strong>VºBº JEFE DE TRÁNSITO AÉREO</strong>
        <br><br><br> Fuente: Tránsito Aéreo Regional La Paz
    </div>

</body>

</html>
