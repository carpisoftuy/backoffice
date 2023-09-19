<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Crear Usuario
    <form action="
    @if(isset($usuario))
    /usuarios/actualizar/{{$usuario->id}}
    @endif
    @if(!isset($usuario))
    @php
    $usuario = new stdClass();
    $usuario->nombre_usuario = '';
    $usuario->idioma_favorito = '';
    $usuario->isAdmin = false;
    $usuario->isAlmacenero = false;
    $usuario->isChofer = false;
    
    @endphp
    /usuarios/crear/
    @endif
    " method="post">
        @csrf
        <label for="nombreUsuario">Nombre de Usuario</label>
        <input id="nombreUsuario" name="username" type="text" value="{{$usuario->username ?? '' }}">
        <label for="contrasena">Contraseña</label>
        <input id="contrasena" name="password" type="password">
        <label for="nombre">Nombres</label>
        <input id="nombre" name="nombre" type="text" value="{{$usuario->nombre ?? '' }}">
        <label for="apellido">Apellidos</label>
        <input id="apellido" name="apellido" type="text" value="{{$usuario->apellido ?? '' }}">
        <label for="almacenero">Almacenero</label>
        <input id="almacenero" name="almacenero" type="checkbox" 
        @if ($usuario->isAlmacenero)
        checked
        @endif
        >
        <label for="admin">Administrador</label>
        <input id="admin" name="admin" type="checkbox" 
        @if ($usuario->isAdmin)
        checked
        @endif
        >
        <label for="chofer">Chofer</label>
        <input id="chofer" name="chofer" type="checkbox" 
        @if ($usuario->isChofer)
        checked
        @endif
        >
        
        <div id="informaciones"><button id="nuevoCampo">Nuevo Campo</button></div>
        <button type="submit">Enviar</button>
    </form>
    <script>
        let nuevoCampo = document.querySelector("#nuevoCampo");
        let divInformaciones = document.querySelector("#informaciones");
        let informaciones = {{ json_encode($usuario->informaciones) }};
        let cantidadInformaciones = informaciones.lenght;
        nuevoCampo.addEventListener("click", function(){
            cantidadInformaciones++;
            let tipo = document.createElement("input");
            tipo.id = "tipo" + informaciones.lenght;
            tipo.placeholder = "Tipo";
            divInformaciones.append(tipo);
            tipo.name= "informaciones["+cantidadInformaciones+"][tipo]"
            let detalle = document.createElement("input");
            detalle.id = "detalle" + cantidadInformaciones;
            detalle.placeholder = "Detalle";
            detalle.name= "informaciones["+cantidadInformaciones+"][detalle]"
            divInformaciones.append(detalle);
        })
                

    </script>
</body>
</html>