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

    <nav class="ourNavbar">

        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <img class="hamburguesa" id="hamburguesa" src="{{ asset('img/list.svg') }}">
        </label>
        <h1 class="titulo">CARPIFAST</h1>
        <a href="./index.html"><img class="logo-menu-hamburguesa" src="{{ asset('img/carpifast.svg') }}"></a>

        <ul class="nav-list">
            <li class="list-element-logo"><a href="./index.html"><img class="logo" src="{{ asset('img/carpifast.svg') }}"></a></li>
            <li class="list-element"><a id="inicio" href="./index.html">Inicio</a></li>
            <li class="list-element"><a id="inicio" href="../backoffice/almacenes">Almacenes</a></li>
            <li class="list-element"><a id="inicio" href="../backoffice/vehiculos">Vehiculos</a></li>
            <li class="list-element"><a id="panel" href="../">Panel backoffice</a></li>
            <li class="list-element"><a id="registro" href="./crear">Registrar usuario</a></li>
            <li class="list-element">
                <div class="dropdown">
                  <button id="idioma" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Idioma</button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#" id="es">Español</a></li>
                    <li><a class="dropdown-item" href="#" id="en">English</a></li>
                  </ul>
                </div>
              </li>
            <li class="list-element" id="switch-container">
                <p class="p-tema" style="margin: 0 20px 0 0;" id="tema">Tema</p>
                <label class="switch">
                <input id="switch" type="checkbox">
                <span class="slider round"></span>
              </label>
            </li>
        </ul>
    </nav>

    <section>
        <div class="container-form">
            <form action="
            @if(isset($usuario))
            /v2/usuarios/actualizar/{{$usuario->id}}
            @endif
            @if(!isset($usuario))
            @php
            $usuario = new stdClass();
            $usuario->isAdmin = false;
            $usuario->isAlmacenero = false;
            $usuario->isChofer = false;
            
            @endphp
            /v2/usuarios/crear/
            @endif
            " method="post">
                @csrf
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