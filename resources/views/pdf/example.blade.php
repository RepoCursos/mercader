<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    ver video:
    https://www.youtube.com/watch?v=kix2lu1L0Ng&list=PLy8Qdj_a4vwFlQUBtD8qpdpqLEWBYFQ-w&index=3 y
    https://www.youtube.com/watch?v=H6j9BoNrESA&list=PLDllzmccetSM50U0Y9fTOWHvSzAZ_W6Il&index=18
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Productos PDF</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .cabecera {
            background-color: black;
            color: white;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="position-relative">
        <img src="{{ public_path() . $logo }}" alt="" width="55">
        <i class="position-absolute top-0 end-0">{{ date('d - m - Y  h:i') }}</i>
    </div>

    <h1 class="text-center p-1">Reporte Productos</h1>

    <table class="table">
        <thead class="cabecera">
            <tr>
                <th>#</th>
                <th>NAME</th>
                <th class="text-center">PRICE</th>
                <th class="text-center">STOCK</th>
                <th>CATEGORY</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $i => $producto)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $producto->name }}</td>
                    <td class="text-end">$ {{ $producto->price }}</td>
                    <td class="text-center">{{ $producto->stock }}</td>
                    <td>{{ $producto->categoria->name }}</td>
                </tr>
                <!-- este div es para hacer un salto de pagina usando css -->
                <div class="page-break"></div>
            @endforeach
        </tbody>
    </table>

</body>

</html>
