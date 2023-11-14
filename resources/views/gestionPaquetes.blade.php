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
    <link rel="stylesheet" href="{{ asset('/css/paquetes.css') }}">
</head>
<body>

    @include('header')

    <header>
        <h2 id="bienvenido">Paquetes</h2>
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
        <form action="/paquetes" method="POST" class="formulario-almacen">
            <h4 id="añadirPaquete">Añadir paquete</h4>

            <p id="pPeso">Peso</p>
            <input name="peso" id="inputPeso" type="number" required>

            <p id="pVolumen">Volumen</p>
            <input name="volumen" id="inputVolumen" type="number" required>

            <select name="tipo" id="recogerEntregar">
                <option selected disabled>Seleccione una opción</option>
                <option value="entregar">Para entregar</option>
                <option value="recoger">Para recoger</option>
            </select>

            <p id="pDireccion" class="d-none">Dirección</p>
            <input name="direccion" class="d-none" id="inputDireccion" type="text" required>

            <p class="d-none" id="pCodigo">Código postal</p>
            <input name="codigo_postal" class="d-none" id="inputCodigo" type="number" required>

            <p class="d-none" id="pLatitud">Latitud</p>
            <input name="latitud" class="d-none" id="inputLatitud" type="number" step="0.000000000000001" required>

            <p class="d-none" id="pLongitud">Longitud</p>
            <input name="longitud" class="d-none" id="inputLongitud" type="number" step="0.00000000000001" required>

            <p class="d-none" id="pAlmacen">Almacen</p>
            <select class="d-none" id="selectAlmacen" name="almacen-destino">
            @foreach ($almacenes as $almacen)
                <option value="{{$almacen->id}}">{{$almacen->direccion}}</option>
            @endforeach
            </select><br>

            <button type="submit" id="crearPaquete">Crear paquete</button>
        </form>
    </div>

    <h2>Paquetes cargados en una camioneta</h2>

    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Fecha de Carga</th>
                <th>Camioneta</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($paquetesEnCamioneta as $paquete)
            <tr>
                <td>{{$paquete->id}}</td>
                <td>{{$paquete->fecha_inicio}}</td>
                <td>{{$paquete->matricula}} ({{$paquete->codigo_pais}})</td>
                <td>
                    <form action="{{ route('paquetes/camioneta.delete', ['id' => $paquete->carga_paquete_id]) }}" method="POST">
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
        <form action="/paquetes/camioneta" method="POST" class="formulario-paquete-camioneta">
            <h4 id="cargarPaqueteCamioneta">Cargar Paquete a Camioneta</h4>

            <label for="formulario-paquete-camioneta-select-paquete">Paquete</label>
            <select name="id_paquete" id="formulario-paquete-camioneta-select-paquete">
                <option selected disabled>Seleccione una opción</option>
                @foreach ($paquetesNoCargados as $paquete)
                <option value="{{$paquete->id}}">{{$paquete->id}}: {{$paquete->peso}}Kg {{$paquete->volumen}}L</option>
                @endforeach
            </select>

            <label for="formulario-paquete-camioneta-select-camioneta">Camioneta</label>
            <select name="id_vehiculo" id="formulario-paquete-camioneta-select-camioneta">
                <option selected disabled>Seleccione una opción</option>
                @foreach ($camionetas as $camioneta)
                <option value="{{$camioneta->id}}">{{$camioneta->matricula}} ({{$camioneta->codigo_pais}})</option>
                @endforeach
            </select>

            <button type="submit" id="cargarPaquete">Cargar paquete</button>
        </form>
    </div>

    <h2>Paquetes cargados en un bulto</h2>

    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Fecha de Carga</th>
                <th>Bulto</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($paquetesEnBulto as $paquete)
            <tr>
                <td>{{$paquete->id}}</td>
                <td>{{$paquete->fecha_inicio}}</td>
                <td>{{$paquete->id_bulto}}</td>
                <td>
                    <form action="{{ route('paquetes/bulto.delete', ['id' => $paquete->bulto_contiene_id]) }}" method="POST">
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
        <form action="/paquetes/bulto" method="POST" class="formulario-paquete-bulto">
            <h4 id="cargarPaqueteBulto">Cargar Paquete a Bulto</h4>

            <label for="formulario-paquete-bulto-select-paquete">Paquete</label>
            <select name="id_paquete" id="formulario-paquete-bulto-select-paquete">
                <option selected disabled>Seleccione una opción</option>
                @foreach ($paquetesNoCargados as $paquete)
                <option value="{{$paquete->id}}">{{$paquete->id}}: {{$paquete->peso}}Kg {{$paquete->volumen}}L</option>
                @endforeach
            </select>

            <label for="formulario-paquete-camioneta-select-bulto">Bulto</label>
            <select name="id_bulto" id="formulario-paquete-bulto-select-bulto">
                <option selected disabled>Seleccione una opción</option>
                @foreach ($bultos as $bulto)
                <option value="{{$bulto->id}}">{{$bulto->id}}</option>
                @endforeach
            </select>

            <button type="submit" id="cargarPaquete">Cargar paquete</button>
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
