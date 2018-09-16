//Validacion con ajax

$(document).ready(function () {
//    alert("hola como estas");

    $(".contactForm").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (respuesta) {
                if (respuesta == "ok") {
                    $("#alerta").removeClass("hide").removeClass("alert-danger").removeClass("alert-success").addClass("alert-succes");
                    $(".respuesta").html("Enviado");
                    $(".mensaje-alerta").html("Enviado Correctamente ...!!");
                } else {
                    $("#alerta").removeClass("hide").removeClass("alert-danger").removeClass("alert-success").addClass("alert-danger");
                    $(".respuesta").html("Error al enviar..!");
                    $(".mensaje-alerta").html("No se pudo enviar ...!!");
                }
            },
            error: function () {
                $("#alerta").removeClass("hide").removeClass("alert-danger").removeClass("alert-success").addClass("alert-danger");
                $(".respuesta").html("Error al enviar");
                $(".mensaje-alerta").html("No se pudo Enviar ...!!");
            }
        });
        return false;
    })


});


