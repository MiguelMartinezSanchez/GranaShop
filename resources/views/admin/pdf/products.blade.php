<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Productos</title>
</head>
<body>

<h1>Listado de Productos</h1>

<table border="1" width="100%" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nombre }}</td>
            <td>{{ $p->precio }} €</td>
            <td>
                <img src="{{ public_path($p->foto) }}" width="60">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>