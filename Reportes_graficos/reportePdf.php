<?php
require_once('./tcpdf/tcpdf.php');

function fetch_data() {
    $output = '';
    require_once('../inc/db.php');
    $sql = "SELECT * FROM `users`ORDER BY id ASC";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if($row['role']=='admin'){  $color= '#ffb33a'; }else{ $color= '#e5e3e3'; }
        $output .= '<tr bgcolor="'.$color.'">
                          <td>' . $row["id"] . '</td>  
                          <td>' . $row["date"] . '</td>  
                          <td>' . $row["first_name"] . '</td>  
                          <td>' . $row["last_name"] . '</td>  
                          <td>S/.' . $row["username"] . '</td>  
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
           <tr bgcolor="'.$color.'">  
                <th>ID</th>  
                <th>Fecha_ingreso</th>  
                <th>Nombre</th>  
                <th>Apellido</th>  
                <th>usuario</th>  
           </tr>
           </thead>
      ';
    $content .= fetch_data();
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
<!DOCTYPE html>  
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Exportar a PDF - Miguel Angel Caro Rojas</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <!-- Meta Mobil
        ================================================== -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styleReportes.css" rel="stylesheet">
    </head>  
    <body>  
        <br /><br />  
        <div class="container-fluid" style="width:700px;">  
            <div class="row padding">
                <div class="col-md-12">
                    <?php
                    $h1 = "Reporte de Usuarios - 2018";
                    echo '<h1>' . $h1 . '</h1>'
                    ?>
                </div>
            </div>
            <div class="row">

                <table class="table table-hover">  
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
                        echo fetch_data();
                        ?>  
                    </tbody>
                </table>  
                <br />  
                <div class="col-md-12">
                    <form method="post">  
                        <input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                        <input type="submit" name="create_pdf" class="btn btn-danger" value="Imprimir Pdf" />  
                    </form>  
                </div>
            </div>  
        </div>  
    </body>  
</html>  



