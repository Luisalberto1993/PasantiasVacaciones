<?php
$session_role2 = $_SESSION['role'];
$session_username2 = $_SESSION['username'];
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="index.php">Fábrica</a>-->
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a><i class="far fa-user-circle fa-1x"></i> <?php echo ucfirst($session_role2); ?></a></li>
                <li><a>Bienvenido: <i class="fa fa-user"></i> <?php echo ucfirst($session_username2); ?></a></li>
                <li><a href="add-post.php"><i class="fa fa-plus-square" title="Agregar Noticia"></i> Agregar Noticia</a></li>
                <?php
                if ($session_role2 == 'admin') {
                    ?>
                    <li><a href="add-user.php"><i class="fa fa-user-plus" title="Agregar Usuario"></i>Agregar Usuario</a></li>
                <?php } ?>
                <li><a href="profile.php"><i class="fa fa-user" title="Ver Perfil"></i>Ver Perfil</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt" title="Salir"></i></a></li>
            </ul>
        </div>
    </div>
</nav>