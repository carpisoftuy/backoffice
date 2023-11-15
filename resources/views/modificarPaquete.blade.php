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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{asset('/js/validarUsuario.js')}}"></script>
</head>
<body>

    @include('header')

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

            <p class="d-none" id="pUbicacion">Ubicacion</p>
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
