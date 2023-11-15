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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{asset('/js/validarUsuario.js')}}"></script>
</head>
<body>

    @include('header')

    <header>
        <h2 id="bienvenido">Bultos</h2>
    </header>

    <div class="table-container">
        <table>
            <tr>
                <th>Id</th>
                <th>Fecha armado</th>
                <th>Volumen</th>
                <th>Peso</th>
                <th>Destino</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($bultos as $bulto)
            <tr>
                <td>{{$bulto->id}}</td>
                <td>{{$bulto->fecha_armado}}</td>
                <td>{{$bulto->volumen}}</td>
                <td>{{$bulto->peso}}</td>
                <td>{{$bulto->direccion}}, {{$bulto->codigo_postal}}</td>
                <td><form action="{{ route('bultos.delete', ['id' => $bulto->id]) }}" method="POST">
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
        <form action="/bultos" method="POST" class="formulario-almacen">
            <h4 id="crearBulto">Crear Bulto</h4>
            <p class="d-none" id="pAlmacen">Almacen de destino</p>
            <select id="selectAlmacen" name="almacen_destino">
            @foreach ($almacenes as $almacen)
                <option value="{{$almacen->id}}">{{$almacen->direccion}}, {{$almacen->codigo_postal}}</option>
            @endforeach
            </select><br>

            <button type="submit" id="crearPaquete">Crear bulto</button>
        </form>
    </div>

    <h2>Bultos cargados en un camión</h2>

    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Fecha de Carga</th>
                <th>Camión</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($bultosEnCamion as $bulto)
            <tr>
                <td>{{$bulto->id}}</td>
                <td>{{$bulto->fecha_inicio}}</td>
                <td>{{$bulto->matricula}} ({{$bulto->codigo_pais}})</td>
                <td>
                    <form action="{{ route('bultos/camion.delete', ['id' => $bulto->carga_bulto_id]) }}" method="POST">
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
        <form action="/bultos/camion" method="POST" class="formulario-almacen">
            <h4 id="cargarBultoCamion">Cargar Bulto a Camión</h4>

            <label for="formulario-bulto-camion-select-bulto">Bulto</label>
            <select name="id_bulto" id="formulario-bulto-camion-select-bulto">
                <option selected disabled>Seleccione una opción</option>
                @foreach ($bultosNoCargados as $bulto)
                <option value="{{$bulto->id}}">{{$bulto->id}}: {{$bulto->fecha_armado}}</option>
                @endforeach
            </select>

            <label for="formulario-bulto-camion-select-camion">Camion</label>
            <select name="id_vehiculo" id="formulario-bulto-camion-select-camion">
                <option selected disabled>Seleccione una opción</option>
                @foreach ($camiones as $camion)
                <option value="{{$camion->id}}">{{$camion->matricula}} ({{$camion->codigo_pais}})</option>
                @endforeach
            </select>

            <button type="submit" id="cargarPaquete">Cargar paquete</button>
        </form>
    </div>

    <h2>Bultos cargados en un almacen</h2>

    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Fecha de Carga</th>
                <th>Almacen</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($bultosEnAlmacen as $bulto)
            <tr>
                <td>{{$bulto->id}}</td>
                <td>{{$bulto->fecha_inicio}}</td>
                <td>{{$bulto->direccion}}, {{$bulto->codigo_postal}}</td>
                <td>
                    <form action="{{ route('bultos/almacen.delete', ['id' => $bulto->bulto_almacen_id]) }}" method="POST">
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
        <form action="/bultos/almacen" method="POST" class="formulario-almacen">
            <h4 id="cargarbultoAlmacen">Cargar Bulto a Almacen</h4>

            <label for="formulario-bulto-almacen-select-bulto">bulto</label>
            <select name="id_bulto" id="formulario-bulto-almacen-select-bulto">
                <option selected disabled>Seleccione una opción</option>
                @foreach ($bultosNoCargados as $bulto)
                <option value="{{$bulto->id}}">{{$bulto->id}}: {{$bulto->peso}}Kg {{$bulto->volumen}}L</option>
                @endforeach
            </select>

            <label for="formulario-bulto-almacen-select-almacen">Almacen</label>
            <select name="id_almacen" id="formulario-bulto-almacen-select-almacen">
                <option selected disabled>Seleccione una opción</option>
                @foreach ($almacenes as $almacen)
                <option value="{{$almacen->id}}">{{$almacen->id}}</option>
                @endforeach
            </select>

            <button type="submit" id="cargarBulto">Cargar bulto</button>
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
