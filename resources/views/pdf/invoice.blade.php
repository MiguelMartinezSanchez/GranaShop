<!DOCTYPE html>
<html>
<head>
    <title>Factura PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>{{ $title }}</h1>

    <p><strong>Fecha:</strong> {{ $date }}</p>
    <p><strong>Cliente:</strong> {{ $user }}</p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['price'] }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>