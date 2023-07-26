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
        <tr>
            <th>Nombre de Usuario</th>
            <th>Nombre y Apellido</th>
            <th>E-mail</th>
            <th>Roles</th>
            <th></th>
        </tr>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{$usuario->nombre_usuario}}</td>
            <td>{{$usuario->nombre . " " . $usuario->apellido}}</td>
            <td>{{$usuario->email}}</td>
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
                <a href="./usuarios/borrar/{{ $usuario->nombre_usuario }}">Borrar</a>
                <a href="./usuarios/actualizar/{{ $usuario->nombre_usuario }}">Actualizar</a>
            </td>
            
        </tr>
        @endforeach
    </table>
</body>
</html>