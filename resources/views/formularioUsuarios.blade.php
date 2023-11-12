<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="{{ asset('img/carpifast.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fuentes.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/registro.css') }}">
</head>
<body>

    @include('header')

    <section>
        <div class="container-form">
            <form action="/usuarios/
@php
$paraEditar = isset($usuario);

if($paraEditar){
echo $usuario->id;
}

if(!$paraEditar){
$usuario = new stdClass();
$usuario->isAdmin = false;
$usuario->isAlmacenero = false;
$usuario->isChofer = false;
}
@endphp
            " method="post">
                @csrf
                @if($paraEditar)
                <input type="hidden" name="_method" value="put">
                @endif
                <h3 id="registrar">Registre un nuevo usuario</h3>
                <label for="nombreUsuario"><p>Nombre de Usuario</p></label><br>
                <input class="form-control" id="nombreUsuario" name="username" type="text" value="{{$usuario->username ?? '' }}"><br>
                <label for="contrasena"><p>Contraseña</p></label><br>
                <input class="form-control" id="contrasena" name="password" type="password"><br>
                <label for="nombre"><p>Nombres</p></label><br>
                <input class="form-control" id="nombre" name="nombre" type="text" value="{{$usuario->nombre ?? '' }}"><br>
                <label for="apellido"><p>Apellidos</p></label><br>
                <input class="form-control" id="apellido" name="apellido" type="text" value="{{$usuario->apellido ?? '' }}"><br>
                <label for="almacenero"><p>Almacenero</p></label>
                <input id="almacenero" name="almacenero" type="checkbox"
                @if ($usuario->isAlmacenero)
                checked
                @endif
                ><br>
                <label for="admin"><p>Administrador</p></label>
                <input id="admin" name="admin" type="checkbox"
                @if ($usuario->isAdmin)
                checked
                @endif
                ><br>
                <label for="chofer"><p>Chofer</p></label>
                <input id="chofer" name="chofer" type="checkbox"
                @if ($usuario->isChofer)
                checked
                @endif
                ><br>
                <div class="btn-container">
                    <button class="btn-registrar" id="registrarUsuario" type="submit">Crear</button>
                </div>
            </form>
        </div>
    </section>

    <footer id="footer">
        <img class="logo-footer" src="{{ asset('img/carpifast.svg') }}">
        <ul class="contacto">
            <li id="contactenos">CONTACTENOS:</li>
            <li>Tel: (+598) 93 312 716</li>
            <li>carpisoft@gmail.com</li>
        </ul>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/modoClaroOscuro/estilosRegistro.js') }}"></script>
    <script src="{{ asset('/js/idiomas/registro_idioma.js') }}"></script>

</body>
</html>
