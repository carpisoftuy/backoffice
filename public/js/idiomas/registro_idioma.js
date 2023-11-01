let es = document.getElementById("es")
let en = document.getElementById("en")

//navbar
let txtInicio = document.getElementById("inicio")
let txtEnvio = document.getElementById("envios")
let txtContacto = document.getElementById("contacto")
let txtIdioma = document.getElementById("idioma")
let txtTema = document.getElementById("tema")
let txtContactenos = document.getElementById("contactenos")
let txtPanel = document.getElementById("panel")
let txtRegistro = document.getElementById("registro")

let txtRegistrar = document.getElementById("registrar")
let txtNombre = document.getElementById("nombre")
let txtApellido = document.getElementById("apellido")
let txtTelefono = document.getElementById("telefono")
let txtNombreUsuario = document.getElementById("nombreUsuario")
let txtSeleccionar = document.getElementById("seleccionar")
let txtChofer = document.getElementById("chofer")
let txtAlmacenero = document.getElementById("almacenero")
let txtAdmin = document.getElementById("administrador")
let txtEmail = document.getElementById("email")
let txtContraseña = document.getElementById("contraseña")
let txtRepetir = document.getElementById("repetir")
let txtRegistrarUsuario = document.getElementById("registrarUsuario")

function traducirAIngles(){

    //navbar
    txtInicio.innerHTML = "Home"
    txtEnvio.innerHTML = "Shipments"
    txtContacto.innerHTML = "Contact"
    txtPanel.innerHTML = "Backoffice panel"
    txtRegistro.innerHTML = "Register user"
    txtIdioma.innerHTML = "Language"
    txtTema.innerHTML = "Theme"
    txtContactenos.innerHTML = "Contact us"

    txtRegistrar.innerHTML = "Register a new user"
    txtNombre.innerHTML = "Name"
    txtApellido.innerHTML = "Last name"
    txtTelefono.innerHTML = "Phone number"
    txtNombreUsuario.innerHTML = "username"
    txtSeleccionar.innerHTML = "select a role"
    txtChofer.innerHTML = "Driver"
    txtAlmacenero.innerHTML = "Storekeeper"
    txtAdmin.innerHTML = "Administrator"
    txtEmail.innerHTML = "Email"
    txtContraseña.innerHTML = "Password"
    txtRepetir.innerHTML = "Repeat the password"
    txtRegistrarUsuario.innerHTML = "Register user"


    
}

function traducirAEspanol(){

    //navbar
    txtInicio.innerHTML = "Inicio"
    txtEnvio.innerHTML = "Envios"
    txtContacto.innerHTML = "Contacto"
    txtPanel.innerHTML = "Panel backoffice"
    txtRegistro.innerHTML = "Registrar usuario"
    txtIdioma.innerHTML = "Idioma"
    txtTema.innerHTML = "Tema"
    txtContactenos.innerHTML = "Contactenos"

    txtRegistrar.innerHTML = "Registre un nuevo usuario"
    txtNombre.innerHTML = "Nombre"
    txtApellido.innerHTML = "Apellido"
    txtTelefono.innerHTML = "Telefono"
    txtNombreUsuario.innerHTML = "Nombre de usuario"
    txtSeleccionar.innerHTML = "Seleccione el Rol"
    txtChofer.innerHTML = "Chofer"
    txtAlmacenero.innerHTML = "Almacenero"
    txtAdmin.innerHTML = "Administrador"
    txtEmail.innerHTML = "Email"
    txtContraseña.innerHTML = "Contraseña"
    txtRepetir.innerHTML = "Repita la contraseña"
    txtRegistrarUsuario.innerHTML = "Registrar usuario"

}

es.addEventListener("click", function(){
    localStorage.setItem("idioma", "es")
    traducirAEspanol()
})

en.addEventListener("click", function(){
    localStorage.setItem("idioma", "en")
    traducirAIngles()
})

idioma = localStorage.getItem("idioma")

if(idioma == "es"){
    traducirAEspanol()
}

if(idioma == "en"){
    traducirAIngles()
}