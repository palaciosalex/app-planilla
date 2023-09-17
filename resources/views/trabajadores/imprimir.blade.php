<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            font-family: Verdana, sans-serif;
        }
        thead{
            background-color: black;
            color: white;
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row" id="seccion-table">
        <table class="table" id="tabla-trabajadores">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">DNI</th>
            <th scope="col">Correo</th>
            <th scope="col">Ingreso x Hora</th>
            <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td >{{ $employee->id }} </td>
                <td >{{ $employee->nombre }}</td>
                <td >{{ $employee->email }}</td>
                <td >{{$employee->ingreso_hora }}</td>
                <td >{{ $employee->estado }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>

</body>
</html>