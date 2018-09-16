<?php
ob_start();
session_start();
header("Location: ../blog.php"); /*para poder volver al blog o login*/
session_destroy();
?>