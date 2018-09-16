
<?php
$nombre = $_FILES['archivo']['name'];
$tipo= $_FILES['archivo']['type'];
$tamanio= $_FILES['archivo']['size'];
$ruta= $_FILES['archivo']['tmp_name'];
$destino = "archivos".$nombre;
if(isset($_POST['subir'])){
    if($nombre != ""){
        if(copy($ruta, $destino)){
            echo 'Exito';
        }else
            {            echo 'error';}
    }
    
}



$query = "INSERT INTO `documentos`(`id_documento`, `titulo`, `descripcion`, `tamanio`, `tipo`, `nombre_docum`) VALUES (NULL,,,,,)";
$consulta = mysqli_query($con, $query);
?>