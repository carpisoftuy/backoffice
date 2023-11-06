<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos</title>
    <link rel="shortcut icon" href="{{ asset('img/carpifast.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fuentes.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/backoffice.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/vehiculos.css') }}">
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
        <h2 id="bienvenido">Vehiculos</h2>
    </header>

    <div class="table-container">
        <table>
            <tr>
                <th>id</th>
                <th>Pais registrado</th>
                <th>Matrícula</th>
                <th>Capacidad Volumen</th>
                <th>Capacidad Peso</th>
                <th>Peso ocupado</th>
                <th>Volumen ocupado</th>
            </tr>
            @foreach ($vehiculos as $vehiculo)
            <tr>
                <td>{{$vehiculo->id}}</td>
                <td>{{$vehiculo->codigo_pais}}</td>
                <td>{{$vehiculo->matricula}}</td>
                <td>{{$vehiculo->capacidad_volumen}}</td>
                <td>{{$vehiculo->capacidad_peso}}</td>
                <td>{{$vehiculo->peso_ocupado}}</td>
                <td>{{$vehiculo->volumen_ocupado}}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <h2>Crear Vehiculo</h2>
    <div class="container-form">
        <form class="formulario-almacen" method="POST" action="../vehiculos"> 
            <label for="codigo_pais">Código país (ej: UY)</label>
            <input type="text" name="codigo_pais">
            <label for="matricula">Matricula</label>
            <input type="text" name="matricula">
            <label for="capacidad_volumen">Capacidad (volumen)</label>
            <input type="number"  name="capacidad_volumen">
            <label for="capacidad_peso">Capacidad (peso)</label>
            <input type="number" name="capacidad_peso">
            <label for="peso_ocupado">Peso ocupado</label>
            <input type="number"  name="peso_ocupado">
            <label for="volumen_ocupado">Volumen ocupado</label>
            <input type="number" name="volumen_ocupado">
            <select>
                <option>Camión</option>
                <option>Camioneta</option>
            </select>


            <button type="submit">Crear</button>
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
                <form method="post" action="../chofer/asignar_camioneta">
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