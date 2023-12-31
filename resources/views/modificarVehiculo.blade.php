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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{asset('/js/validarUsuario.js')}}"></script>
</head>
<body>

    @include('header')

    <header>
        <h2 id="bienvenido">Bienvenido Administrador</h2>
    </header>

    <main class="container-form">
        <form action="../../vehiculos/{{$vehiculo->id}}" method="POST" class="formulario-almacen">
            <input type="hidden" name="_method" value="put" />
            <label for="codigo_pais">Código país (ej: UY)</label>
            <input type="text" name="codigo_pais" value="{{$vehiculo->codigo_pais}}">
            <label for="matricula">Matricula</label>
            <input type="text" name="matricula" value="{{$vehiculo->matricula}}">
            <label for="capacidad_volumen">Capacidad (volumen)</label>
            <input type="number"  name="capacidad_volumen" value="{{$vehiculo->capacidad_volumen}}">
            <label for="capacidad_peso">Capacidad (peso)</label>
            <input type="number" name="capacidad_peso" value="{{$vehiculo->capacidad_peso}}">
            <label for="peso_ocupado">Peso ocupado</label>
            <input type="number"  name="peso_ocupado" value="{{$vehiculo->peso_ocupado}}">
            <label for="volumen_ocupado">Volumen ocupado</label>
            <input type="number" name="volumen_ocupado" value="{{$vehiculo->volumen_ocupado}}">
            <select name="tipo">
                <option value="camion"
                @if($vehiculo->tipo == "camion")
                selected
                @endif
                >Camión</option>
                <option value="camioneta"
                @if($vehiculo->tipo == "camioneta")
                selected
                @endif
                >Camioneta</option>
            </select>
            <button type="submit">Crear</button>
        </form>
    </main>

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
