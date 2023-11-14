<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>backOffice</title>
    <link rel="shortcut icon" href="{{ asset('img/carpifast.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fuentes.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/backoffice.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/paquetes.css') }}">
</head>
<body>

    @include('header')

    <header>
        <h2 id="bienvenido">Bienvenido Administrador</h2>
    </header>

    <h2>Listado de usuarios</h2>

    <div class="table-container">
        <table>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Nombre y Apellido</th>
                <th>Roles</th>
                <th>Eliminar usuario</th>
                <th>Modificar</th>
            </tr>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->username}}</td>
                <td>{{$usuario->nombre . " " . $usuario->apellido}}</td>
                <td>
                @if($usuario->isAdmin)
                Administrador
                @endif
                @if($usuario->isChofer)
                Chofer
                @endif
                @if($usuario->isAlmacenero)
                Almacenero
                @endif
                </td>
                <td>
                    <form action="{{ route('usuarios.delete', ['id' => $usuario->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                <td><a href="/backoffice/usuarios/modificar/{{ $usuario->id }}">Modificar</a></td>

            </tr>
            @endforeach
        </table>
    </div>


    <h2>Listado de choferes</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>id</th>
                <th>Nombre de usuario</th>
                <th>Nombre y apellido</th>
            </tr>
            @foreach ($choferes as $chofer)
            <tr>
                <td>{{$chofer->id}}</td>
                <td>{{$chofer->username}}</td>
                <td>{{$chofer->nombre . " " . $chofer->apellido}}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <h2>Listado de Choferes en actividad</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>Nombre de usuario</th>
                <th>Nombre</th>
                <th>Vehiculo</th>
                <th>Fecha de Inicio</th>
                <th></th>
            </tr>
            @foreach ($manejas as $maneja)
            <tr>
                <td>{{$maneja->username}}</td>
                <td>{{$maneja->nombre}} {{$maneja->apellido}}</td>
                <td>{{$maneja->matricula}} ({{$maneja->codigo_pais}})</td>
                <td>{{$maneja->fecha_inicio}}</td>
                <td>
                    <form action="{{ route('choferes/asignar.delete', ['id' => $maneja->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Terminar Actividad</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <h2>Asignar Chofer a Vehiculo</h2>
    <div class="container-form">

        <form class="formulario-almacen" method="POST" action="/choferes/asignar">
            <label for="formulario-asignar-chofer-vehiculo-id_usuario">Usuario</label>
            <select id="formulario-asignar-chofer-vehiculo-id_usuario" name="id_usuario" required>
                <option disabled selected></option>
            @foreach ($choferes as $chofer)
                <option value="{{$chofer->id}}">{{$chofer->username}}</option>
            @endforeach
            </select>
            <label for="formulario-asignar-chofer-vehiculo-id_vehiculo">Vehiculo</label>
            <select id="formulario-asignar-chofer-vehiculo-id_vehiculo" name="id_vehiculo" required>
                <option disabled selected></option>
            @foreach ($vehiculos as $vehiculo)
                <option value="{{$vehiculo->id}}">{{$vehiculo->matricula}} ({{$vehiculo->codigo_pais}})</option>
            @endforeach
            </select>

            <button type="submit">Asignar</button>
        </form>
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
