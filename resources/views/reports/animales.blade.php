<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Animales</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Reporte de Animales</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Arete</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Fecha Nacimiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animales as $animal)
            <tr>
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->arete }}</td>
                <td>{{ $animal->especie }}</td>
                <td>{{ $animal->raza }}</td>
                <td>{{ $animal->fecha_nacimiento }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
