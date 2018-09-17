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
                                    <?php
//                                    header ('Content-type: application/pdf; charset=utf-8');
                                    // header('content-type: application/pdf');
//                                readfile('archivos/' . $datos['nombre_archivo']);
                                    ?>

                                    <iframe class="col-md-8" src="archivos/<?php echo $datos['nombre_archivo']; ?>"></iframe>

                                    <style>
                                        iframe{
                                            margin-left: 45%;
                                            width: 1240px;
                                            height: 300px;


                                        }

                                    </style>

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