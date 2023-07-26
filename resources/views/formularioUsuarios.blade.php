<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Crear Usuario
    <form action="
    @if(isset($usuario))
    /usuarios/actualizar/{{$usuario->nombre_usuario}}
    @endif
    @if(!isset($usuario))
    /usuarios/crear/
    @endif
    " method="post">
        @csrf
        <label for="nombreUsuario">Nombre de Usuario</label>
        <input id="nombreUsuario" name="nombreUsuario" type="text" value="{{$usuario->nombre_usuario ?? '' }}">
        <label for="contrasena">Contraseña</label>
        <input id="contrasena" name="contrasena" type="password">
        <label for="nombre">Nombres</label>
        <input id="nombre" name="nombre" type="text" value="{{$usuario->nombre ?? '' }}">
        <label for="apellido">Apellidos</label>
        <input id="apellido" name="apellido" type="text" value="{{$usuario->apellido ?? '' }}">
        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" value="{{$usuario->email ?? '' }}">
        <label for="idiomaFavorito">Idioma Favorito</label>
        <select name="idiomaFavorito" id="idiomaFavorito">
            <option value="es"
            @if ($usuario->idioma_favorito === "es")
            selected
            @endif
            >Español</option>
            <option value="en"
            @if ($usuario->idioma_favorito === "en")
            selected
            @endif
            >Inglés</option>
        </select>
        <label for="codigoPostal">Codigo Postal</label>
        <input id="codigoPostal" name="codigoPostal" type="text" value="{{$usuario->codigo_postal ?? '' }}">
        <label for="calle">Calle</label>
        <input id="calle" name="calle" type="text" value="{{$usuario->calle ?? '' }}">
        <label for="nroPuerta">Numero de Puerta</label>
        <input id="nroPuerta" name="nroPuerta" type="text" value="{{$usuario->nro_puerta ?? '' }}">
        <label for="observacionesDireccion">Observaciones Direccion</label>
        <input id="observacionesDireccion" name="observacionesDireccion" type="text"value="{{$usuario->observaciones_direccion ?? '' }}">
        <label for="latitud">Latitud</label>
        <input id="latitud" name="latitud" type="text" value="{{$usuario->latitud ?? '' }}">
        <label for="longitud">Longitud</label>
        <input id="longitud" name="longitud" type="text"value="{{$usuario->longitud ?? '' }}">
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