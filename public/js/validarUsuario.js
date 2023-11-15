jQuery.ajax({
    url: 'http://127.0.0.1:8000/api/validar',
    type: 'GET',
    headers:{
        Authorization: "Bearer " + localStorage.getItem("token"),
    },

    success: function(data) {
        console.log("autorizado con token")
    },

    error: function(){
        alert("que haces aca skinny (flaquito)");
        window.location.href = "/login"
    }

});

function cerrarSesion(){

    jQuery.ajax({
        url: 'http://127.0.0.1:8000/api/logout',
        type: 'GET',
        headers:{
            Authorization: "Bearer " + localStorage.getItem("token"),
        },

        success: function() {
            localStorage.removeItem("token")
            window.location.href = "/login"
        },

    });

}
