<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>almacenes</title>
    <link rel="shortcut icon" href="{{ asset('img/carpifast.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fuentes.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/backoffice.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/almacenes.css') }}">
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
            <li class="list-element"><a id="inicio" href="./almacenes">Almacenes</a></li>
            <li class="list-element"><a id="inicio" href="./vehiculos">Vehiculos</a></li>
            <li class="list-element"><a id="panel" href="../">Panel backoffice</a></li>
            <li class="list-element"><a id="registro" href="../usuarios/crear">Registrar usuario</a></li>
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
        <h2 id="bienvenido">Almacenes</h2>
    </header>

    <div class="table-container">
        <table>    
            <tr>
                <th>Id</th>
                <th>Espacio</th>
                <th>Espacio ocupado</th>
                <th>Dirección</th>
                <th>Modificar</th>
                <th></th>
            </tr>
            @foreach ($almacenes as $almacen)
            <tr>
                <td>{{$almacen->id}}</td>
                <td>{{$almacen->espacio}}</td>
                <td>{{$almacen->espacio_ocupado}}</td>
                <td>{{$almacen->direccion}} {{$almacen->codigo_postal}}</td>
                <td><a>Modificar</a></td>
                <td><form action="{{ route('almacenes.delete', ['id' => $almacen->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <h2>Crear Almacen</h2>
    <div class="container-form">
        <form class="formulario-almacen" method="POST" action="../almacenes">
            <label for="espacio" name="espacio">Espacio</label>
            <input type="number" name="espacio" required>
            <label for="espacio_ocupado" name="espacio_ocupado">Espacio ocupado</label>
            <input type="number" name="espacio_ocupado" required>
            <label for="id_ubicacion" name="id_ubicacion">Ubicación</label>
            <select name="id_ubicacion">
                @foreach ($direcciones as $direccion)

                <option>{{$direccion->id}}</option>
                @endforeach
            </select>

            <button type="submit">Crear</button>
        </form>
    </div>
    
    <h2>Ubicaciones</h2>
    <div class="table-container">
        <table>    
            <tr>
                <th>Id</th>
                <th>Dirección</th>
                <th>Código postal</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($direcciones as $direccion)
            <tr>
                <td>{{$direccion->id}}</td>
                <td>{{$direccion->direccion}}</td>
                <td>{{$direccion->codigo_postal}}</td>
                <td>{{$direccion->latitud}}</td>
                <td>{{$direccion->longitud}}</td>
                <td><a>Modificar</a></td>
                <td><form action="{{ route('ubicaciones.delete', ['id' => $direccion->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <h2>Crear Ubicación</h2>
    <div class="container-form">
        <form class="formulario-almacen" method="POST" action="../ubicaciones">
            <label for="direccion">Dirección (calle y nro)</label>
            <input type="text" name="direccion">
            <label for="codigo_postal">Código postal</label>
            <input type="number" name="codigo_postal">
            <label for="latitud">Latitud</label>
            <input type="number" name="latitud" step="0.000000000000001">
            <label for="longitud">Longitud</label>
            <input type="number" name="longitud" step="0.000000000000001">


            <button type="submit">Crear</button>
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