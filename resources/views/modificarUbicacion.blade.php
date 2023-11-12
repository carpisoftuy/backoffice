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
    <link rel="stylesheet" href="{{ asset('/css/vehiculos.css') }}">
</head>
<body>

    @include('header')

    <div class="container-form">
        <form class="formulario-almacen" method="POST" action="../../ubicaciones/{{$ubicacion->id}}">
            <input type="hidden" name="_method" value="put" />
            <label for="direccion">Dirección (calle y nro)</label>
            <input type="text" name="direccion"  value="{{$ubicacion->direccion}}">
            <label for="codigo_postal">Código postal</label>
            <input type="number" name="codigo_postal"  value="{{$ubicacion->codigo_postal}}">
            <label for="latitud">Latitud</label>
            <input type="number" name="latitud" step="0.000000000000001"  value="{{$ubicacion->latitud}}">
            <label for="longitud">Longitud</label>
            <input type="number" name="longitud" step="0.000000000000001"  value="{{$ubicacion->longitud}}">


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
