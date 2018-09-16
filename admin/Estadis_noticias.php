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
                    <h1><i class="fa fa-users"></i> Noticias <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>    
                        <li class="active"><i class="fa fa-users"></i> Vista de usuarios</li>
                    </ol>

                    <!--para mostrar el grafico estadistico-->
                    <?php
                    $query = "SELECT `author`, `views` FROM `posts` WHERE views > 3";
                    $result = mysqli_query($con, $query);
                    ?>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages': ['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Noticias', 'Vistas Obtenidas'],
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "['" . $row["author"] . "', " . $row["views"] . "],"; //para imprimir en un arreglo
}
//            ['Work', 11], //este es un arreglo
?>
                            ]);
                            var options = {
                                title: 'Visualizaciones Obtenidas, en Noticias publicadas',
                                is3D: true
                            };
                            //BarChart, LineChart, PieChart
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="piechart" style="width: 900px; height: 500px; border: 1px; text-align: center"></div>

                    <!--para mostrar el grafico estadistico-->



                </div>
            </div>

        </div>

        <?php require_once('inc/footer.php'); ?>
   