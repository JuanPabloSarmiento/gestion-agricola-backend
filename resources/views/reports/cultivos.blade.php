<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Cultivos</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        h3 { margin-top: 30px; }
        
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background: #f2f2f2; }

        .sub-table-title {
            font-size: 14px; 
            margin-top: 10px; 
            margin-bottom: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Reporte de Cultivos</h2>

    @foreach($cultivos as $cultivo)

        <!-- Información del cultivo -->
        <h3>Cultivo #{{ $cultivo->id }} — {{ $cultivo->nombre }}</h3>

        <table>
            <tbody>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $cultivo->nombre }}</td>
                </tr>
                <tr>
                    <th>Tipo</th>
                    <td>{{ $cultivo->tipo ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Fecha de Siembra</th>
                    <td>{{ $cultivo->fecha_siembra }}</td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td>{{ $cultivo->estado ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Aplicaciones de insumos -->
        <p class="sub-table-title">Aplicaciones de Insumos:</p>

        @if ($cultivo->aplicaciones->count() > 0)

            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Dosis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cultivo->aplicaciones as $app)
                    <tr>
                        <td>{{ $app->fecha }}</td>
                        <td>{{ $app->producto }}</td>
                        <td>{{ $app->dosis }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        @else

            <p>No tiene aplicaciones registradas.</p>

        @endif

        <hr>

    @endforeach

</body>
</html>
