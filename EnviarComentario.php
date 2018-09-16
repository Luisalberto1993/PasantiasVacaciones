<?php

if(isset($_POST['name']) &&!empty($_POST['name']) &&
isset($_POST['phone']) &&!empty($_POST['phone'])&&
isset($_POST['email']) &&!empty($_POST['email'])&&
isset($_POST['mensaje']) &&!empty($_POST['mensaje'])) {

    return print "Ok";
}
header('location: index.php');
return print('no se puede enviar');



?>
//llamando a los campos
$nombre = $_POST['name'];
$telefono = $_POST['phone'];
$mail = $_POST['email'];
$mensaje = $_POST['mensaje'];

//datos para el correo electronico

$destinatario = "luisguanolema3@gmail.com"; //para enviar al correo donde llegaran los sms
$asunto = "contacto desde nuestra web";

$carta = "De: $nombre\n";   //variable para enviar todo el mensaje con sus datos
$carta .= "Correo: $mail\n";
$carta .= "Teléfono: $telefono\n";
$carta .= "Mensaje: $mensaje\n";

//Enviado mensaje
mail($destinatario, $asunto, $carta);
header('Location:mensajeExitoso.php');
