<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Usuarios</title>
</head>
<body>
    <header>
        <a href="/usuarios/crear"> Crear Usuario </a>
    </header>
    <table>
        <h2>Listado de usuarios</h2>
        <tr>
            <th>Nombre de Usuario</th>
            <th>Nombre y Apellido</th>
            <th>Roles</th>
            <th></th>
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
                <a href="./usuarios/borrar/{{ $usuario->id }}">Borrar</a>
                <a href="./usuarios/actualizar/{{ $usuario->id }}">Actualizar</a>
            </td>
            
        </tr>
        @endforeach
    </table>

    <table>
        <h2>Listado de choferes</h2>
        <tr>
            <th>id</th>
            <th>Nombre de usuario</th>
            <th>Nombre y apellido</th>
            <th>Asignar camioneta</th>
        </tr>
        @foreach ($choferes as $chofer)
        <tr>
            <form method="post" action="chofer/asignar_camioneta">
                @csrf
                <input name="id_usuario" value="{{$chofer->id}}" style="display: none">
                <td>{{$chofer->id}}</td>
                <td>{{$chofer->username}}</td>
                <td>{{$chofer->nombre . " " . $chofer->apellido}}</td>
                <td>
                    <select name="id_vehiculo">
                        <option disabled selected></option>
                    @foreach ($camionetas as $camioneta)
                        <option value="{{$camioneta->id}}">{{$camioneta->matricula}}</option>
                    @endforeach
                </select>
                </td>
                <td><button type="submit">Actualizar</button></td>
            </form>
        </tr>
        @endforeach
    </table>

    <table>
        <h2>Camionetas</h2>
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

    <table>
        <h2>Paquetes</h2>
        <tr>
            <th>id</th>
            <th>Peso</th>
            <th>Volumen</th>
            <th>Asignar camioneta</th>
            <th></th>
        </tr>
        @foreach ($paquetes as $paquete)
        <form action="paquete/asignar_camioneta" method="POST">
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

    <table>
        <h2>Paquetes en transito</h2>
        <tr>
            <th>id paquete</th>
            <th>Chofer asignado</th>
            <th>Camioneta asignada</th>
            <th>Peso</th>
            <th>Volumen</th>
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


</body>
</html>