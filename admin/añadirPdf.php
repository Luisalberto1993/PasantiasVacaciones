<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}
?>
</head>
<body>
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Agregar<small> Nuevo </small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Nuevo Usuario</li>
                    </ol>
                    <?php
                    if (isset($_POST['subir'])) {


                        $nombre = $_FILES['archivo']['name'];
                        $tipo = $_FILES['archivo']['type'];
                        $tamanio = $_FILES['archivo']['size'];
                        $ruta = $_FILES['archivo']['tmp_name'];
                        $destino = "archivos/" . $nombre;
//                        $check_query = "SELECT * FROM tbl_documentos WHERE titulo = '$titulo'";
//                        $check_run = mysqli_query($con, $check_query);
                        if ($nombre != "") {
                            if (copy($ruta, $destino)) {
                                $titulo = $_POST['titulo'];
                                $descri = $_POST['descripcion'];

                                $sql = "INSERT INTO tbl_documentos(titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre')";
                                $query = mysqli_query($con, $sql);

//                                if (empty($titulo) or empty($descri)) {
//                                    $error = "Todos los (*) Campos son requeridos";
//                                } else if (mysqli_num_rows($check_run) > 0) {
//                                    $error = "nombre ya existe";
//                                } else
                                if ($query) {
                                    echo "Se guardo correctamente";
                                }
                            } else {
                                echo "Error al subir domento";
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="first-name">Titulo :*</label>
                                    <?php
                                    if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    } else if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }
                                    ?>
                                    <input type="text" id="first-name" name="titulo" class="form-control" value="<?php
                                    if (isset($titulo)) {
                                        echo $titulo;
                                    }
                                    ?>" placeholder="Nombres">
                                </div>

                                <div class="form-group">
                                    <label for="last-name">Descripcion :*</label>
                                    <input type="text" id="last-name" name="descripcion" class="form-control" value="<?php
                                    if (isset($descripcion)) {
                                        echo $descripcion;
                                    }
                                    ?>" placeholder="Apellidos">
                                </div>


                                <div class="form-group">
                                    <label for="image">Documento :*</label>
                                    <input type="file" id="image" name="archivo" accept="application/pdf">
                                </div>

                                <input type="submit" value="Agregar D" name="subir" class="btn btn-primary">
                                <a href="lista.php">lista</a>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>