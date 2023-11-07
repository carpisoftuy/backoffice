let select = document.getElementById("recogerEntregar")
let pDireccion = document.getElementById("pDireccion")
let inputDireccion = document.getElementById("inputDireccion")
let pCodigo = document.getElementById("pCodigo")
let inputCodigo = document.getElementById("inputCodigo")
let pAlmacen = document.getElementById("pAlmacen")
let selectAlmacen = document.getElementById("selectAlmacen")
let opcionSeleccionada;
let inputPeso = document.getElementById("inputPeso")
let inputVolumen = document.getElementById("inputVolumen")
let crearPaquete = document.getElementById("crearPaquete")
let pLatitud = document.getElementById("pLatitud")
let pLongitud = document.getElementById("pLongitud")
let inputLongitud = document.getElementById("inputLongitud")
let inputLatitud = document.getElementById("inputLatitud")

let select2 = document.getElementById("selectAlmacenes2")
let select3 = document.getElementById("selectAlmacenes3")

select.addEventListener("change", function(){

    opcionSeleccionada = select.value
    console.log(opcionSeleccionada)

    if(opcionSeleccionada == "entregar"){
        pDireccion.classList.remove("d-none")
        inputDireccion.classList.remove("d-none")
        pCodigo.classList.remove("d-none")
        inputCodigo.classList.remove("d-none")
        pAlmacen.classList.add("d-none")
        selectAlmacen.classList.add("d-none")

        pLatitud.classList.remove("d-none")
        pLongitud.classList.remove("d-none")
        inputLatitud.classList.remove("d-none")
        inputLongitud.classList.remove("d-none")


        inputDireccion.required = true;
        inputCodigo.required = true;
        selectAlmacen.required = false;
        inputLatitud.required = true;
        inputLongitud.required = true;

    }

    if(opcionSeleccionada == "recoger"){
        pDireccion.classList.add("d-none")
        inputDireccion.classList.add("d-none")
        pCodigo.classList.add("d-none")
        inputCodigo.classList.add("d-none")
        pLatitud.classList.add("d-none")
        pLongitud.classList.add("d-none")
        inputLatitud.classList.add("d-none")
        inputLongitud.classList.add("d-none")

        pAlmacen.classList.remove("d-none")
        selectAlmacen.classList.remove("d-none")
        selectAlmacen.required = true;


        inputDireccion.required = false;
        inputCodigo.required = false;
        inputLatitud.required = false;
        inputLongitud.required = false;
    }

})
