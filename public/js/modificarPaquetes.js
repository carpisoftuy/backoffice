let select = document.getElementById("recogerEntregar")

let pAlmacen = document.getElementById("pAlmacen")
let selectAlmacen = document.getElementById("selectAlmacen")
let opcionSeleccionada;
let inputPeso = document.getElementById("inputPeso")
let inputVolumen = document.getElementById("inputVolumen")
let crearPaquete = document.getElementById("crearPaquete")

let select2 = document.getElementById("selectAlmacenes2")
let select3 = document.getElementById("selectAlmacenes3")

let pUbicacion = document.getElementById("pUbicacion")
let selectUbicacion = document.getElementById("selectUbicacion")

select.addEventListener("change", function(){

    opcionSeleccionada = select.value
    console.log(opcionSeleccionada)

    if(opcionSeleccionada == "entregar"){
        pUbicacion.classList.remove("d-none")
        selectUbicacion.classList.remove("d-none")
        pAlmacen.classList.add("d-none")
        selectAlmacen.classList.add("d-none")

        selectAlmacen.required = false;

        selectUbicacion.required = true;

    }

    if(opcionSeleccionada == "recoger"){
        pUbicacion.classList.add("d-none")
        selectUbicacion.classList.add("d-none")

        pAlmacen.classList.remove("d-none")
        selectAlmacen.classList.remove("d-none")
        selectAlmacen.required = true;

        selectUbicacion.required = false;
    }

})
