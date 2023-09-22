<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Crear Usuario
    <form action="
    @if(isset($usuario))
    /usuarios/actualizar/{{$usuario->id}}
    @endif
    @if(!isset($usuario))
    @php
    $usuario = new stdClass();
    $usuario->isAdmin = false;
    $usuario->isAlmacenero = false;
    $usuario->isChofer = false;
    
    @endphp
    /usuarios/crear/
    @endif
    " method="post">
        @csrf
        <label for="nombreUsuario">Nombre de Usuario</label>
        <input id="nombreUsuario" name="username" type="text" value="{{$usuario->username ?? '' }}">
        <label for="contrasena">Contraseña</label>
        <input id="contrasena" name="password" type="password">
        <label for="nombre">Nombres</label>
        <input id="nombre" name="nombre" type="text" value="{{$usuario->nombre ?? '' }}">
        <label for="apellido">Apellidos</label>
        <input id="apellido" name="apellido" type="text" value="{{$usuario->apellido ?? '' }}">
        <label for="almacenero">Almacenero</label>
        <input id="almacenero" name="almacenero" type="checkbox" 
        @if ($usuario->isAlmacenero)
        checked
        @endif
        >
        <label for="admin">Administrador</label>
        <input id="admin" name="admin" type="checkbox" 
        @if ($usuario->isAdmin)
        checked
        @endif
        >
        <label for="chofer">Chofer</label>
        <input id="chofer" name="chofer" type="checkbox" 
        @if ($usuario->isChofer)
        checked
        @endif
        >
        <button type="submit">Enviar</button>
    </form>
</body>
</html>