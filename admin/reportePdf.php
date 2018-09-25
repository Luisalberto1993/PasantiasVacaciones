<?php require_once('inc/top.php'); ?>
<?php
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
                    <h1><i class="fa fa-users"></i> Reportes <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>    
                        <li class="active"><i class="fa fa-users"></i> Reporte de usuarios</li>
                    </ol>
                    <div class="col-md-9">
                        <?php
                        $h1 = "Reporte de Usuarios - 2018";
                        echo '<h1>' . $h1 . '</h1>'
                        ?>
                    </div>


                    <table id="table table-hover">  
                        <thead>
                            <tr>  
                                <th width="5%">ID</th>  
                                <th width="30%">Fecha_ingreso</th>  
                                <th width="10%">nombre</th>  
                                <th width="45%">apellido</th>  
                                <th width="10%">Usuario</th>  
                            </tr>  
                        </thead>
                        <tbody>
                            <?php
                            echo fetch_data($con);
                            ?>  
                        </tbody>
                    </table>  
                    <br />  

                    <style>
                        tr:hover{
                            background: #f0f0f0;

                        }
                        .contenedor-form{

                            padding-left: 35%;  
                        }
                        .contenedor-form input[type="submit"]{
                            width: 50%;
                            /*margin-right: 40%;*/
                            height: 44px;
                            margin-bottom: 20px;
                            font-size: 14px;
                            border: 1px solid #000;
                            display: block;
                            font-size: 14px;
                            font-weight:600;
                            background: #f36715;
                            margin: 0 0 20px 0;
                            border: none;
                            border-radius: 2px;
                            box-sizing: border-box;
                            font-family: 'Lato', sans-serif;
                            transition: all .5s ease;
                            cursor: pointer;

                        }

                        .contenedor-form input[type="submit"]:hover {
                            background: rgba(243, 103, 21, 0.8);


                        }

                        .cust1{
                            margin-left: 35px;

                        }

                        .contenedor-form .formulario i{

                            position: absolute;
                            margin-right:10%;
                            margin-top: 1px;
                            width: 44px;
                            height: 36px;
                            padding-top: 8px;
                            color: rgba(0,0,0,.2);

                        }
                    </style>

                    <div class="col-md-9 contenedor-form">
                        <div class="formulario">
                            <form method="post">  
                                <input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">

                                <i class="fas fa-print fa-2x cust1"></i>
                                <input type="submit" name="create_pdf" class="btn btn-danger" value="Ver Pdf" />
                            </form>  
                        </div>
                    </div>


                    <!--para los reportes-->

                    <?php
                    require_once('./tcpdf/tcpdf.php');

                    function fetch_data($con) {
                        $output = '';
//    require_once('../inc/db.php'); para incluir la base Daos
                        $sql = "SELECT * FROM `users`ORDER BY id ASC";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['role'] == 'admin') {
                                $color = '#ffb33a';
                            } else {
                                $color = '#e5e3e3';
                            }
                            $output .= '<tr bgcolor="' . $color . '">
                          <td>' . $row["id"] . '</td>  
                          <td>' . $row["date"] . '</td>  
                          <td>' . $row["first_name"] . '</td>  
                          <td>' . $row["last_name"] . '</td>  
                          <td>' . $row["username"] . '</td>  
                     </tr>  
                          ';
                        }
                        return $output;
                    }

                    if (isset($_POST["create_pdf"])) {
                        require_once('tcpdf/tcpdf.php');
                        $obj_pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
                        $obj_pdf->SetCreator(PDF_CREATOR);
                        $obj_pdf->SetAuthor('Fábrica Ideas'); //el autor quien crea
//    $obj_pdf->SetTitle("Lista de Usuarios Ingresados");
                        $obj_pdf->SetTitle($_POST['reporte_name']);
                        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
                        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                        $obj_pdf->SetDefaultMonospacedFont('helvetica');
                        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
                        $obj_pdf->SetMargins(20, 20, 20, false);
                        $obj_pdf->setPrintHeader(false);
                        $obj_pdf->setPrintFooter(false);
                        $obj_pdf->SetAutoPageBreak(TRUE, 20);
                        $obj_pdf->SetFont('Helvetica', '', 10);
                        $obj_pdf->AddPage();


//      <tr>  
//                <th width="5%">ID</th>  
//                <th width="30%">Fecha_ingreso</th>  
//                <th width="10%">NOmbre</th>  
//                <th width="45%">Apellido</th>  
//                <th width="10%">usuario</th>  
//           </tr> 
                        $content = '';
                        $content .= '  <div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">' . $_POST['reporte_name'] . '</h1>
      <table border="1" cellpadding="5"> 
      <thead>
           <tr bgcolor="' . $color . '">  
                <th>ID</th>  
                <th>Fecha_ingreso</th>  
                <th>Nombre</th>  
                <th>Apellido</th>  
                <th>usuario</th>  
           </tr>
           </thead>
      ';
                        $content .= fetch_data($con);
                        $content .= '</table>';
                        $content .= '<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
            	<span>Visítanos</span><a href="http://www.google.com">by Fábrica Ideas</a>
            </div>
        </div>';

                        $obj_pdf->writeHTML($content, true, 0, true, 0);
                        ob_end_clean(); //rompimiento de pagina
                        $obj_pdf->lastPage();
                        $obj_pdf->Output('Ejemplo.pdf', 'I');
                    }
                    ?>  

                    <!--para los reportes-->


                </div>
            </div>

        </div>

        <?php require_once('inc/footer.php'); ?>