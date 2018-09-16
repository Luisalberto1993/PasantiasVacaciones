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

                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-hover"><thead>
                                    <tr>
                                        <td>titulo</td>
                                        <td>descripcion</td>
                                        <td>tamaño</td>
                                        <td>tipo</td>
                                        <td>nombre</td>
                                    </tr>
                                </thead>
                                <?php
                                include 'config.inc.php';
                                $sql = "select *from tbl_documentos";
                                $query = mysqli_query($con, $sql);

                                while ($datos = mysqli_fetch_array($query)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $datos['titulo']; ?></td>
                                            <td><?php echo $datos['descripcion']; ?></td>
                                            <td><?php echo $datos['tamanio']; ?></td>
                                            <td><?php echo $datos['tipo']; ?></td>
                                            <td><a href="archivo.php?id=<?php echo $datos['id_documento'] ?>"><?php echo $datos['nombre_archivo']; ?></a></td>
                                        </tr>
                                    </tbody>
                                <?php } ?>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>