<?php require_once('inc/top.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $del_check_query = "SELECT * FROM users WHERE id = $del_id";
    $del_check_run = mysqli_query($con, $del_check_query);
    if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "DELETE FROM `users` WHERE `users`.`id` = $del_id";
        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                $msg = "Usuario eliminado";
            } else {
                $error = "Usuario no ha sido eliminado";
            }
        }
    } else {
        header('location: index.php');
    }
}

if (isset($_POST['checkboxes'])) {

    foreach ($_POST['checkboxes'] as $user_id) {

        $bulk_option = $_POST['bulk-options'];

        if ($bulk_option == 'delete') {
            $bulk_del_query = "DELETE FROM `users` WHERE `users`.`id` = $user_id";
            mysqli_query($con, $bulk_del_query);
        } else if ($bulk_option == 'author') {
            $bulk_author_query = "UPDATE `users` SET `role` = 'author' WHERE `users`.`id` = $user_id";
            mysqli_query($con, $bulk_author_query);
        } else if ($bulk_option == 'admin') {
            $bulk_admin_query = "UPDATE `users` SET `role` = 'admin' WHERE `users`.`id` = $user_id";
            mysqli_query($con, $bulk_admin_query);
        }
    }
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
                    <h1><i class="fa fa-users"></i> Usuarios <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                       <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>    
                        <li class="active"><i class="fa fa-users"></i> Usuarios</li>
                    </ol>
                    <?php
                    $query = "SELECT * FROM users ORDER BY id DESC";
                    $run = mysqli_query($con, $query);
                    if (mysqli_num_rows($run) > 0) {
                        ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <select name="bulk-options" id="" class="form-control">
                                                    
                                                    <option value="">Seleccionar</option>
                                                    <option value="delete">Eliminar</option>
                                                    <option value="author">Cambiar a Cliente</option>
                                                    <option value="admin">Cambiar a Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="submit" class="btn btn-success" value="Aplicar cambios">
                                            <a href="add-user.php" class="btn btn-primary">Agregar Nuevo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($error)) {
                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                            } else if (isset($msg)) {
                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                            }
                            ?>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th>Id #</th>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Imagen</th>
                                        <th>Password</th>
                                        <th>Rol</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($run)) {
                                        $id = $row['id'];
                                        $first_name = ucfirst($row['first_name']);
                                        $last_name = ucfirst($row['last_name']);
                                        $email = $row['email'];
                                        $username = $row['username'];
                                        $role = $row['role'];
                                        $image = $row['image'];
                                        $date = getdate($row['date']);
                                        $day = $date['mday'];
                                        $month = substr($date['month'], 0, 3);
                                        $year = $date['year'];
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id; ?>"></td>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo "$day $month $year"; ?></td>
                                            <td><?php echo "$first_name $last_name"; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><img src="img/<?php echo $image; ?>" width="30px"></td>
                                            <td>***********</td>
                                            <td><?php echo ucfirst($role); ?></td>
                                            <td><a href="edit-user.php?edit=<?php echo $id; ?>"><i class="far fa-edit"></i></a></td>
                                            <td><a href="users.php?del=<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "<center><h2>Usuarios no disponibles por ahora</h2></center>";
                        }
                        ?>
                    </form>
                </div>
            </div>

        </div>

        


    <?php require_once('inc/footer.php'); ?>
   