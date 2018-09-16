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
                            <?php 
                            $sql = "select *from tbl_documentos where id_documento=" . $_GET['id'];
                            $run = mysqli_query($con, $sql);
                            if ($datos = mysqli_fetch_array($run)) {
                            if ($datos['nombre_archivo'] == "") {
                            ?>
                            <p>No Existen archivos</p>
                            <?php } else { ?>
                                <?php header('content-type: application/pdf');
                                readfile('archivos/' . $datos['nombre_archivo']);
                                ?>
                                <iframe src="archivos/<?php echo $datos['nombre_archivo']; ?>"></iframe>
                                header('content-type:application/vnd.ms-excel');
                                readfile('archivos/' . $datos['nombre_archivo']);
                                //                header('Content-type: application/vnd.ms-excel');
                                //                header("Pragma: no-cache");
                                //                header("Content-Disposition: attachment; filename=nombre_del_archivo.xls");

                                <?php
                            }
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<?php require_once('inc/footer.php'); ?>