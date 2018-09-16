<?php
ob_start();
session_start();
require_once('../inc/db.php');

if (isset($_POST['submit'])) {
    $date = time();
    $first_name = mysqli_real_escape_string($con, $_POST['first-name']);
    $username = mysqli_real_escape_string($con, strtolower($_POST['username']));
    $username_trim = preg_replace('/\s+/', '', $username);
    $email = mysqli_real_escape_string($con, strtolower($_POST['email']));
    $password = mysqli_real_escape_string($con, $_POST['password']);
//                        $role = $_POST['role'];
    $role = 'author';
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email'";
    $check_run = mysqli_query($con, $check_query);

    $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
    $salt_run = mysqli_query($con, $salt_query);
    $salt_row = mysqli_fetch_array($salt_run);
    $salt = $salt_row['salt'];

    $password = crypt($password, $salt);

    if (empty($first_name) or empty($username) or empty($email) or empty($password)) {
        $error = "Todos los (*) Campos son requeridos";
    } else if ($username != $username_trim) {
        $error = "No usar espacios en el usuario";
    } else if (mysqli_num_rows($check_run) > 0) {
        $error = "usuario o email ya existe";
    } else {
        $insert_query = "INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `email`, `image`, `password`, `role`) VALUES (NULL, '$date', '$first_name', '', '$username', '$email', '$image', '$password', '$role')";
        if (mysqli_query($con, $insert_query)) {
            $msg = "Usuario ingresado";

            move_uploaded_file($image_tmp, "img/$image");
            $image_check = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
            $image_run = mysqli_query($con, $image_check);
            $image_row = mysqli_fetch_array($image_run);
            $check_image = $image_row['image'];

            $first_name = "";
            $email = "";
            $username = "";
            header('location: login.php');
        } else {
            $error = "Usuario no ingresado";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registro de Usuarios | Fábrica Ideas</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="img/Logo.png" rel="icon">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animated.css" rel="stylesheet">
        <!-- estilo para el login -->
        <link href="css/registroAnimado.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    </head>
    <body>

        <div class="contenedor-form">
            <div class="toggle">
                <span> <a href="login.php"></a></span>
            </div>

            <div class="formulario">
                <h2>Registro</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <!--<div class="alert alert-danger"><i class=" fa fa-close"</div>-->

                    <?php
                    if (isset($error)) {
                        echo "<div class='alert alert-danger' style='color:red;><i class='fa fa-close'></i>$error</div>";
//                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                    } else if (isset($msg)) {

                        echo "<div class = 'alert alert-success' role = 'alert' style = 'color:green;'><i class='fa fa-close'></i>$msg
                        </div>";

//                        echo "<span class = 'pull-right' style = 'color:green;'>$msg</span>";
                    }
                    ?>
                    <i class="fas fa-address-card fa-2x cust"></i>

                    <input type="text" id="first-name" name="first-name" class="form-control" value="<?php
                    if (isset($first_name)) {
                        echo $first_name;
                    }
                    ?>" placeholder="Nombre">

                    <i class="far fa-user fa-2x cust"></i> 
                    <input type="text" id="username" name="username" class="form-control" value="<?php
                    if (isset($username)) {
                        echo $username;
                    }
                    ?>" placeholder="Usuario">

                    <i class="fas fa-envelope fa-2x cust"></i>
                    <input type="email" id="email" name="email" class="form-control" value="<?php
                    if (isset($email)) {
                        echo $email;
                    }
                    ?>" placeholder="Email Address">
                    <i class="fas fa-unlock fa-2x cust"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">

                    <i class="fas fa-upload fa-2x subida"></i>
                    <input type="file" id="image" name="image">

<!--                    <br>
                    <label><i class="fas fa-user-plus fa-2x cust1"></i></label>-->
                    <input type="submit" value="Registrar" name="submit">


                </form>
            </div>
            <div class="reset-password">
                <a href="login.php"><i class="fas fa-sign-in-alt fa-1x cust1"></i>  Ya eres usuario </a>
                <br>
                <a href="../index.php"> <i class="fas fa-sign-out-alt fa-1x cust"></i>  Salir </a>
            </div>

        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/loginAnimado.js"></script>
    </body>
</html>


