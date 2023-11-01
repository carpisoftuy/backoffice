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

let txtBienvenido = document.getElementById("bienvenido")
let txtNombreUsuario = document.getElementById("nombreUsuario")
let txtRol = document.getElementById("rol")
let txtMasDatos = document.getElementById("masDatos")
let txtEliminarUsuario = document.getElementById("eliminarUsuario")
let txtClick = document.getElementsByClassName("click")
let txtEliminar = document.getElementsByClassName("eliminar")


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
    
    txtBienvenido.innerHTML = "Welcome administrator"
    txtNombreUsuario.innerHTML = "Username"
    txtRol.innerHTML = "Role"
    txtMasDatos.innerHTML = "More data"
    txtEliminarUsuario.innerHTML = "Delete user"

    for (let i = 0; i < txtClick.length; i++) {
        txtClick[i].innerHTML = "Click here";
    }

    for (let i = 0; i < txtEliminar.length; i++) {
        txtEliminar[i].innerHTML = "Delete";
    }

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

    txtBienvenido.innerHTML = "Bienvenido administrador"
    txtNombreUsuario.innerHTML = "Nombre de usuario"
    txtRol.innerHTML = "Rol"
    txtMasDatos.innerHTML = "Mas datos"
    txtEliminarUsuario.innerHTML = "Eliminar usuario"

    for (let i = 0; i < txtClick.length; i++) {
        txtClick[i].innerHTML = "Click aqui";
    }

    for (let i = 0; i < txtEliminar.length; i++) {
        txtEliminar[i].innerHTML = "Eliminar";
    }


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