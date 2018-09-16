<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$session_username = $_SESSION['username'];
$session_author_image = $_SESSION['author_image'];
?>
</head>
<body>
    <?php
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "archivos" . $nombre;
    if (isset($_POST['subir'])) {
        if ($nombre != "") {
            if (copy($ruta, $destino)) {
                echo 'Exito';
            } else {
                echo 'error';
            }
        }
    }


//
//    $query = "INSERT INTO `documentos`(`id_documento`, `titulo`, `descripcion`, `tamanio`, `tipo`, `nombre_docum`) VALUES (NULL,,,,,)";
//    $consulta = mysqli_query($con, $query);
    ?>


    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label>titulo: </label></td>
                <td><input type="text" name="titulo"></td>
            </tr>
            <tr>
                <td><label>Descripcion:</label></td>
                <td><textarea name="descripcion"></textarea></td>
            </tr>
            <tr>
                <td><label>Descripcion:</label></td>
                <td><input type="submit" value="subir"></td>
            </tr>

        </table>
    </form>

    <?php require_once('inc/footer.php'); ?>