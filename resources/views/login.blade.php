<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | carpifast</title>
    <link rel="shortcut icon" href="./img/carpifast.svg" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/css/fuentes.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>
<body>

    <nav class="ourNavbar">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <img class="hamburguesa" id="hamburguesa" src="./img/list.svg">
        </label>
        <h1 class="titulo">CARPIFAST</h1>
        <a href="./login.html"><img class="logo-menu-hamburguesa" src="./img/carpifast.svg"></a>

        <ul class="nav-list">
            <li class="list-element-logo"><a href="./login.html"><img class="logo" src="./img/carpifast.svg"></a></li>
            <li class="list-element"><a id="login" href="./login.html">Login</a></li>
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

    <section>

        <div class="login-container">

        <img class="img-background" src="./img/login-fondo.png">

        <div class="form-container">
            <img src="./img/carpifast.svg" class="login-logo">
            <h2 id="bienvenido">Bienvenido de nuevo</h2>

            <form action="/usuario/validar" method="POST">
                <input name="username" type="text" placeholder="Usuario" id="username" required>
                <input name="password" type="password" placeholder="Contraseña" id="password" required><br>
                <button type="submit" id="loginBtn" class="btn-login">Ingresar</button>
            </form>
        </div>

        </div>

    </section>

    <footer id="footer">
        <img class="logo-footer" src="./img/carpifast.svg">
        <ul class="contacto">
            <li id="contactenos">CONTACTENOS:</li>
            <li>Tel: (+598) 93 312 716</li>
            <li>carpisoft@gmail.com</li>
        </ul>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/modoClaroOscuro/estilosLogin.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="{{ asset('/js/idiomas/login_idioma') }}"></script>


</body>
</html>
