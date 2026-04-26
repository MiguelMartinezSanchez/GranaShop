<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Marcas</title>
</head>
<body>

<h1>Listado de Marcas</h1>

<table border="1" width="100%" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->nombre }}</td>
            <td>
                <img src="{{ public_path($b->foto) }}" width="60">
            </td>
            <td>{{ $b->descripcion }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>