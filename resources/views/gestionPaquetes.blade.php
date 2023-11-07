<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes</title>
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
            <li class="list-element"><a href="./paquetes">Paquetes</a></li>
            <li class="list-element"><a href="./almacenes">Almacenes</a></li>
            <li class="list-element"><a href="./vehiculos">Vehiculos</a></li>
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
        <h2 id="bienvenido">paquetes</h2>
    </header>

    <div class="table-container">
        <table>
            <tr>
                <th>Id</th>
                <th>Fecha despacho</th>
                <th>Peso</th>
                <th>Volumen</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($paquetes as $paquete)
            <tr>
                <td>{{$paquete->id}}</td>
                <td>{{$paquete->fecha_despacho}}</td>
                <td>{{$paquete->peso}}</td>
                <td>{{$paquete->volumen}}</td>
                <td><a href="/backoffice/paquetes/{{$paquete->id}}">Modificar</a></td>
                <td><form action="{{ route('paquetes.delete', ['id' => $paquete->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="container-form">
        <form action="#" method="POST" class="formulario-almacen">
            <h4 id="añadirPaquete">Añadir paquete</h4>
    
            <p id="pPeso">Peso</p>
            <input id="inputPeso" type="number" required>
    
            <p id="pVolumen">Volumen</p>
            <input id="inputVolumen" type="number" required>
    
            <select name="recogerEntregar" id="recogerEntregar">
                <option selected disabled>Seleccione una opción</option>
                <option value="entregar">Para entregar</option>
                <option value="recoger">Para recoger</option>
            </select>
    
            <p id="pDireccion" class="d-none">Dirección</p>
            <input class="d-none" id="inputDireccion" type="text" required>
    
            <p class="d-none" id="pCodigo">Código postal</p>
            <input  class="d-none" id="inputCodigo" type="number" required>
    
            <p class="d-none" id="pAlmacen">Almacen</p>
            <select class="d-none" id="selectAlmacen">
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
    <script src="{{ asset('/js/paquetes.js') }}"></script>

</body>
</html>
