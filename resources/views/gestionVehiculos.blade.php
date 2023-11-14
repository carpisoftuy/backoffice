<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos</title>
    <link rel="shortcut icon" href="{{ asset('img/carpifast.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fuentes.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/backoffice.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/vehiculos.css') }}">
</head>
<body>

    @include('header')

    <header>
        <h2 id="bienvenido">Vehiculos</h2>
    </header>

    <div class="table-container">
        <table>
            <tr>
                <th>id</th>
                <th>Pais registrado</th>
                <th>Matrícula</th>
                <th>Capacidad Volumen</th>
                <th>Capacidad Peso</th>
                <th>Peso ocupado</th>
                <th>Volumen ocupado</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($vehiculos as $vehiculo)
            <tr>
                <td>{{$vehiculo->id}}</td>
                <td>{{$vehiculo->codigo_pais}}</td>
                <td>{{$vehiculo->matricula}}</td>
                <td>{{$vehiculo->capacidad_volumen}}</td>
                <td>{{$vehiculo->capacidad_peso}}</td>
                <td>{{$vehiculo->peso_ocupado}}</td>
                <td>{{$vehiculo->volumen_ocupado}}</td>
                <td><a href="/backoffice/vehiculos/{{$vehiculo->id}}">Modificar</a></td>
                <td><form action="{{ route('vehiculos.delete', ['id' => $vehiculo->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form></td>
            </tr>
            @endforeach
        </table>
    </div>

    <h2>Crear Vehiculo</h2>
    <div class="container-form">
        <form class="formulario-almacen" method="POST" action="../vehiculos">
            <label for="codigo_pais">Código país (ej: UY)</label>
            <input type="text" name="codigo_pais">
            <label for="matricula">Matricula</label>
            <input type="text" name="matricula">
            <label for="capacidad_volumen">Capacidad (volumen)</label>
            <input type="number"  name="capacidad_volumen">
            <label for="capacidad_peso">Capacidad (peso)</label>
            <input type="number" name="capacidad_peso">
            <label for="peso_ocupado">Peso ocupado</label>
            <input type="number"  name="peso_ocupado">
            <label for="volumen_ocupado">Volumen ocupado</label>
            <input type="number" name="volumen_ocupado">
            <select name="tipo">
                <option value="camion">Camión</option>
                <option value="camioneta">Camioneta</option>
            </select>


            <button type="submit">Crear</button>
        </form>
    </div>


    <h2>Camionetas</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>id</th>
                <th>Pais registrado</th>
                <th>Matrícula</th>
            </tr>
            @foreach ($camionetas as $camioneta)
            <tr>
                <td>{{$camioneta->id}}</td>
                <td>{{$camioneta->codigo_pais}}</td>
                <td>{{$camioneta->matricula}}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <h2>Camiones</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>id</th>
                <th>Pais registrado</th>
                <th>Matrícula</th>
            </tr>
            @foreach ($camiones as $camion)
            <tr>
                <td>{{$camion->id}}</td>
                <td>{{$camion->codigo_pais}}</td>
                <td>{{$camion->matricula}}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <footer id="footer">
        <img class="logo-footer" src="{{ asset('img/carpifast.svg') }}">
        <ul class="contacto">
            <li id="contactenos">CONTACTENOS:</li>
            <li>Tel: (+598) 93 312 716</li>
            <li>carpisoft@gmail.com</li>
        </ul>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/modoClaroOscuro/estiloBackoffice.js') }}"></script>
    <script src="{{ asset('/js/idiomas/backoffice_idioma.js') }}"></script>

</body>
</html>
