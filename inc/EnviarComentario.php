<?php

function validar_campo($campo) {
    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}

header("Content-type: application/json");
if (isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['mensaje']) && !empty($_POST['mensaje'])) {

    $destinoEmail = "luisguanolema3@gmail.com";
    $nombre = validar_campo($_POST['name']);
    if (isset($_POST['phone'])) {
        $telefono = validar_campo($_POST['phone']);
    }
    $email = validar_campo($_POST['email']);
    $mensaje = validar_campo($_POST['mensaje']);

    $contenido = "De: $nombre\n";   //variable para enviar todo el mensaje con sus datos
    $contenido .= "Correo: $mail\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Mensaje: $mensaje\n";

    mail($destinoEmailail, "Mensaje de contacto del cliente" . $nombre, $contenido);


    return print(json_encode('ok'));
}
return print(json_encode('noenviado'));
?>
