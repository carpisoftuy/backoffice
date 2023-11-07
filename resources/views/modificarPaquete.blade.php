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
    <link rel="stylesheet" href="{{ asset('/css/paquetes.css') }}">
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
            <li class="list-element"><a href="./backoffice/paquetes">Paquetes</a></li>
            <li class="list-element"><a href="./backoffice/almacenes">Almacenes</a></li>
            <li class="list-element"><a href="./backoffice/vehiculos">Vehiculos</a></li>
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

    <div class="container-form">
        <form action="/paquetes/{{$paquete->id}}" method="POST" class="formulario-almacen">
            <input type="hidden" name="_method" value="put" />
            <h4 id="añadirPaquete">Añadir paquete</h4>

            <p id="pPeso">Peso</p>
            <input name="peso" id="inputPeso" type="number" required value="{{$paquete->peso}}">

            <p id="pVolumen">Volumen</p>
            <input name="volumen" id="inputVolumen" type="number" required value="{{$paquete->volumen}}">

            <select name="tipo" id="recogerEntregar">
                <option selected disabled>Seleccione una opción</option>
                <option value="entregar">Para entregar</option>
                <option value="recoger">Para recoger</option>
            </select>

            <p class="d-none" id="pUbicacion">Almacen</p>
            <select class="d-none" id="selectUbicacion" name="ubicacion_destino">
            @foreach ($ubicaciones as $ubicacion)
                <option value="{{$ubicacion->id}}">{{$ubicacion->direccion}}</option>
            @endforeach
            </select><br>

            <p class="d-none" id="pAlmacen">Almacen</p>
            <select class="d-none" id="selectAlmacen" name="almacen_destino">
            @foreach ($almacenes as $almacen)
                <option value="{{$almacen->id}}">{{$almacen->direccion}}</option>
            @endforeach
            </select><br>

            <button type="submit" id="crearPaquete">Crear paquete</button>
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
    <script src="{{ asset('/js/modificarPaquetes.js') }}"></script>

</body>
</html>
