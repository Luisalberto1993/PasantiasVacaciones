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
                    <h1><i class="fa fa-user-plus"></i> Listado<small> Documentos </small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Listado</li>
                    </ol>

                    <div class="row">
                        <div class="col-md-8">
                            <br>
                            <br>
                            <style>
                                table{
                                    width: 100%;
                                    
                                }
                                th{
                                    background: #f0f0f0;
                                    
                                }
                                
                                thead{
                                    font-weight: 600;
                                    font-size: 15px;
                                    margin-left: 45px;
                                    text-align: left;
                                }
                                .tabla-hover{
                                    margin-left: 30px;
                                    font-size:12px;
                                    text-align: center;
                                    width: 600px;

                                }
                            </style>

                            <table class="table-hover">
                                <thead>
                                    <tr>

                                        <!--<th width="5%">ID</th>-->  
                                        <th width="30%">Título</th>  
                                        <th width="30%">Descripción</th>  
                                        <!--<th width="40%">Tipo</th>-->
                                        <th width="40%">Documento</th>
                                        
                                        <!--<th width="10%">Nombre</th>-->  

                                    </tr>
                                </thead>
                                <?php
                                $sql = "select *from tbl_documentos";
                                $query = mysqli_query($con, $sql);
                                while ($datos = mysqli_fetch_array($query)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $datos['titulo']; ?></td>
                                            <td><?php echo $datos['descripcion']; ?></td>
                                            
                                            <td><i class="fas fa-download" style=" color: #2fa4e7"></i> <a href="archivoAñadirPdf.php?id=<?php echo $datos['id_documento'] ?>"><?php echo $datos['nombre_archivo']; ?></a></td>
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