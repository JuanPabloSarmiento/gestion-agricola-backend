<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Cultivos</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Reporte de Cultivos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Fecha Siembra</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cultivos as $cultivo)
            <tr>
                <td>{{ $cultivo->id }}</td>
                <td>{{ $cultivo->nombre }}</td>
                <td>{{ $cultivo->tipo }}</td>
                <td>{{ $cultivo->fecha_siembra }}</td>
                <td>{{ $cultivo->estado }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
