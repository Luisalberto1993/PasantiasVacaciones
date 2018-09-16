<?php
ob_start();
session_start();
require_once('../inc/db.php');


//para el login del usuario
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, strtolower($_POST['username']));
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $check_username_query = "SELECT * FROM users WHERE username = '$username'";
    $check_username_run = mysqli_query($con, $check_username_query);
    if (mysqli_num_rows($check_username_run) > 0) {
        $row = mysqli_fetch_array($check_username_run);

        $db_username = $row['username'];
        $db_password = $row['password'];
        $db_role = $row['role'];
        $db_author_image = $row['image'];

        $password = crypt($password, $db_password);

        if ($username == $db_username && $password == $db_password) {
            header('Location: index.php');
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = $db_role;
            $_SESSION['author_image'] = $db_author_image;
        } else {
            $error = "Usuario o clave incorrectas";
        }
    } else {
        $error = "Usuario o clave incorrectas";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Animado | Fábrica Ideas</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/favicon.png">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animated.css" rel="stylesheet">
        <!-- estilo para el login -->
        <link href="css/loginAnimado.css" rel="stylesheet">

    </head>
    <body>

        <div class="contenedor-form">
            <div class="toggle">
                <span> <a href="registroUsuarios.php">Crear Cuenta</a></span>
            </div>

            <div class="formulario">
                <h2>Iniciar Sesión</h2>
                <form action="" method="post">
                    <input type="text" placeholder="Usuario" id="inputEmail" name="username" required>
                    <input type="password" placeholder="Contraseña" id="inputPassword" name="password" required>
                    <div class="checkbox">
                        <label>
                            <?php
                            if (isset($error)) {
                                echo "$error";
                            }
                            ?>
                        </label>
                        <input type="submit" value="Iniciar Sesión" name="submit">
                        </form>
                    </div>
            </div>
            <div class="reset-password">
                <a href="#">Olvide mi Contraseña?</a>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/loginAnimado.js"></script>
    </body>
</html>
