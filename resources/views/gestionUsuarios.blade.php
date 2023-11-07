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

    <nav class="ourNavbar">

        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <img class="hamburguesa" id="hamburguesa" src="{{ asset('img/list.svg') }}">
        </label>
        <h1 class="titulo">CARPIFAST</h1>
        <a href="./index.html"><img class="logo-menu-hamburguesa" src="{{ asset('img/carpifast.svg') }}"></a>

        <ul class="nav-list">
            <li class="list-element-logo"><a href="./index.html"><img class="logo" src="{{ asset('img/carpifast.svg') }}"></a></li>
            <li class="list-element"><a href="/backoffice/paquetes">Paquetes</a></li>
            <li class="list-element"><a href="/backoffice/almacenes">Almacenes</a></li>
            <li class="list-element"><a href="/backoffice/vehiculos">Vehiculos</a></li>
            <li class="list-element"><a id="panel" href="./">Panel backoffice</a></li>
            <li class="list-element"><a id="registro" href="./usuarios/crear">Registrar usuario</a></li>
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
                <td><a href="./usuarios/borrar/{{ $usuario->id }}">Borrar</a></td>
                <td><a href="./usuarios/actualizar/{{ $usuario->id }}">Modificar</a></td>

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
                <th>Asignar camioneta</th>
                <th></th>
            </tr>
            @foreach ($choferes as $chofer)
            <tr>
                <form method="post" action="./chofer/asignar_camioneta">
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
