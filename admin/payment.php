<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?> 
<link href="assets/css/custom-styles.css" rel="stylesheet" />
<link href="admin/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />


<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Detalles de la publicacion<small> </small>
                </h1>
            </div>
        </div> 
        <!-- /. ROW  -->


        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th> Tipo de publicacion</th>
                                        <th>Tipo de proyecto</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>No archivos</th>
                                        <th>Tipo documento</th>

                                                    <!--<th>Alquiler de la habitación</th>-->
                                                    <!--<th>Bed Rent</th>-->
                                                    <!--<th>Comidas </th>-->
                                                    <!--<th>Gr.Total</th>-->
                                        <th>Impresión</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include ('../inc/db.php');
                                    $sql = "select * from users";
                                    $re = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($re)) {

                                        $id = $row['id'];

                                        if ($id % 2 == 1) {
                                            echo"<tr class='gradeC'>
													<td>" . $row['date'] . "</td>
													<td>" . $row['first_name'] . "</td>
													<td>" . $row['last_name'] . "</td>
													<td>" . $row['username'] . "</td>
													<td>" . $row['email'] . "</td>
													<td>" . $row['image'] . "</td>
													<td>" . $row['role'] . "</td>
													<td>" . $row['details'] . "</td>
													<td><a href=print.php?pid=" . $id . " <button class='btn btn-primary'> <i class='fa fa-print' ></i> Imprimir </button></td>
													</tr>";
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->                            <!--End Advanced Tables -->
                <!--End Advanced Tables -->

            </div>
        </div>
        <!-- /. ROW  -->

    </div>

</div>


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- jQuery Js -->
<!-- Metis Menu Js -->
<?php require_once './inc/footer.php';?> 
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>


</body>
</html>
