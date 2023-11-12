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
                <td><a href="/usuarios/{{ $usuario->id }}/borrar/">Borrar</a></td>
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
                    <form action="/choferes/desasignar_vehiculo/{{$maneja->id}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <h2>Asignar Chofer a Vehiculo</h2>
    <div class="container-form">

        <form class="formulario-asignar-chofer-vehiculo" method="POST" action="/choferes/asignar_vehiculo">
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

    <h2>Paquetes</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>id</th>
                <th>Peso</th>
                <th>Volumen</th>
                <th>Asignar camioneta</th>
                <th></th>
            </tr>
            @foreach ($paquetes as $paquete)
            <form action="./paquete/asignar_camioneta" method="POST">
                @csrf
                <input name="paquete" value="{{$paquete->id}}" style="display: none">
                <tr>
                    <td>{{$paquete->id}}</td>
                    <td>{{$paquete->peso}}</td>
                    <td>{{$paquete->volumen}}</td>
                    <td>
                        <select name="camioneta">
                                <option disabled selected></option>
                            @foreach ($camionetas as $camioneta)
                                <option value="{{$camioneta->id}}">{{$camioneta->matricula}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><button type="submit">Actualizar</button></td>
                </tr>
            </form>
            @endforeach
        </table>
    </div>

    <h2>Paquetes en transito</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>id paquete</th>
                <th>Chofer asignado</th>
                <th>Camioneta asignada</th>
                <th>Peso</th>
                <th>Volumen</th>
                <th>Finalizar transito</th>
            </tr>
            @foreach ($paquetes_en_transito as $paquete_transito)
            <tr>
                <td>{{$paquete_transito->id}}</td>
                <td>{{$paquete_transito->nombre}}</td>
                <td>{{$paquete_transito->matricula}}</td>
                <td>{{$paquete_transito->peso}}</td>
                <td>{{$paquete_transito->volumen}}</td>
                <td><a href="./paquete/finalizar_transito/{{ $paquete_transito->id_paquete }}">Finalizar transito</a></td>
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
    <script>
        console.log({{$paquetes_en_transito}})
    </script>

</body>
</html>
