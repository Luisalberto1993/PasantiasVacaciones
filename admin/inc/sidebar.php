<?php
$session_role1 = $_SESSION['role'];

$get_comment = "SELECT * FROM comments WHERE status = 'pending'";
$get_comment_run = mysqli_query($con, $get_comment);
$num_of_rows = mysqli_num_rows($get_comment_run);
?>
<div class="list-group">
    <a href="index.php" class="list-group-item active">
        <i class="fas fa-home"></i>  Menu principal
    </a>
    <a href="posts.php" class="list-group-item">
        <i class="fas fa-list-ul"></i> Noticias publicadas
    </a>
    <!--                      <a href="media.php" class="list-group-item">
                              <i class="fa fa-database"></i> Imágenes
                          </a>-->
    <?php
    if ($session_role1 == 'admin') {
        ?>
        <a href="comments.php" class="list-group-item">
            <?php
            if ($num_of_rows > 0) {
                echo "<span class='badge'>$num_of_rows</span>";
            }
            ?>
            <i class="fa fa-comment"></i> Comentarios Realizados
        </a>
        <a href="categories.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Categoría de Noticias
        </a>
        <a href="users.php" class="list-group-item">
            <i class="fa fa-users"></i> Usuarios Registrados
        </a>
        <!--        <a href="listados.php" class="list-group-item">
                        <i class=""></i> Búsquedas
                    </a>-->


        <!--        <li class="dropdown" style="list-style: none">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fas fa-chart-pie"></i>
                        Estadísticos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="listados.php" class="list-group-item">
                                <i class="fas fa-chart-pie"></i> Vistas</a>
                            <a href="listados.php" class="list-group-item">
                                <i class="fas fa-chart-pie"></i> Porcentaje de User</a>
        
                        </li>
                    </ul>
                </li>-->

        <a href="Estadis_noticias.php" class="list-group-item">
            <i class="fas fa-chart-pie"></i>  Estadistístico Noticias</a>
        <a href="Estadis_Usuarios.php" class="list-group-item">
            <i class="fas fa-chart-bar"></i>  Estadístico Usuarios</a>
        <a href="reportePdf.php" class="list-group-item">
            <i class="fas fa-print"></i> Reportes Pdf
        </a>
    <?php } ?>
</div>