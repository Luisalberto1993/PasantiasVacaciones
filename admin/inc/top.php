<?php
ob_start();
session_start();
require_once('../inc/db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Fábrica | Admin</title>

        <!-- Bootstrap -->
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
        <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

        <link href="img/Logo.png" rel="icon">
        <!--        <link href="css/font-awesome.css" rel="stylesheet">-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
        <link href="css/animated.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <!--<link href="css/RegistroUsuarios.css" rel="stylesheet">-->
        <!--<link href="css/estilosBusquedaDinmica.css" rel="stylesheet">-->

        <!--para las tablas de busqueda-->

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>

        <!--para las tablas de busqueda-->
        <!--
                <script>
                    $(document).ready(function () {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>   -->