<nav class="ourNavbar">

    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <img class="hamburguesa" id="hamburguesa" src="{{ asset('img/list.svg') }}">
    </label>
    <h1 class="titulo">CARPIFAST</h1>
    <a href="/backoffice"><img class="logo-menu-hamburguesa" src="{{ asset('img/carpifast.svg') }}"></a>

    <ul class="nav-list">
        <li class="list-element-logo"><a href="/backoffice"><img class="logo" src="{{ asset('img/carpifast.svg') }}"></a></li>
        <li class="list-element"><a href="/backoffice/paquetes">Paquetes</a></li>
        <li class="list-element"><a href="/backoffice/bultos">Bultos</a></li>
        <li class="list-element"><a href="/backoffice/almacenes">Almacenes</a></li>
        <li class="list-element"><a href="/backoffice/vehiculos">Vehiculos</a></li>
        <li class="list-element"><a id="panel" href="/backoffice">Panel backoffice</a></li>
        <li class="list-element"><a id="registro" href="/backoffice/usuarios/crear">Registrar usuario</a></li>
        <li class="list-element"><a id="cerrar_sesion" style="cursor: pointer;" onclick="cerrarSesion()">Cerrar sesión</a></li>
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
