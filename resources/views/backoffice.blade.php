<!DOCTYPE html>
<html lang="en">
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
    
    <nav class="ourNavbar">

        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <img class="hamburguesa" id="hamburguesa" src="./img/list.svg">
        </label>
        <h1 class="titulo">CARPIFAST</h1>
        <a href="./index.html"><img class="logo-menu-hamburguesa" src="{{ asset('img/carpifast.svg') }}"></a>

        <ul class="nav-list">
            <li class="list-element-logo"><a href="./index.html"><img class="logo" src="{{ asset('img/carpifast.svg') }}"></a></li>
            <li class="list-element"><a id="inicio" href="./index.html">Inicio</a></li>
            <li class="list-element"><a id="envios" href="./envios.html">Envios</a></li>
            <li class="list-element"><a id="contacto" href="./contacto.html">Contacto</a></li>
            <li class="list-element"><a id="panel" href="./backoffice.html">Panel backoffice</a></li>
            <li class="list-element"><a id="registro" href="./registrarUsuario.html">Registrar usuario</a></li>
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

    <header>
        <h2 id="bienvenido">Bienvenido Administrador</h2>
    </header>

    <section class="table-container">
        
        <table>
            <thead>
                <th>Id</th>
                <th id="nombreUsuario">Nombre de usuario</th>
                <th id="rol">Rol</th>
                <th id="masDatos">Mas datos...</th>
                <th id="eliminarUsuario">Eliminar usuario</th>
            </thead>
    
            <tbody>
                <tr>
                    <td>0</td>
                    <td>sosam</td>
                    <td>Administrador</td>
                    <td><a href="#" class="click">Click Aqui</a></td>
                    <td><a href="#" class="eliminar">Eliminar</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>slopez</td>
                    <td>Chofer</td>
                    <td><a href="#" class="click">Click Aqui</a></td>
                    <td><a href="#" class="eliminar">Eliminar</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>bborges</td>
                    <td>Almacenero</td>
                    <td><a href="#" class="click">Click Aqui</a></td>
                    <td><a href="#" class="eliminar">Eliminar</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>jrodriguez</td>
                    <td>Chofer</td>
                    <td><a href="#" class="click">Click Aqui</a></td>
                    <td><a href="#" class="eliminar">Eliminar</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>dalonso</td>
                    <td>Almacenero</td>
                    <td><a href="#" class="click">Click Aqui</a></td>
                    <td><a href="#" class="eliminar">Eliminar</a></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>atrezza</td>
                    <td>administrador</td>
                    <td><a href="#" class="click">Click Aqui</a></td>
                    <td><a href="#" class="eliminar">Eliminar</a></td>
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
            </tbody>
        </table> 
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
    <script src="./js/modoClaroOscuro/estiloBackoffice.js"></script>
    <script src="./js/idiomas/backoffice_idioma.js"></script>
 
</body>
</html>