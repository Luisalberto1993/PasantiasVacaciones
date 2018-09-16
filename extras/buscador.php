<!--require_once './inc/top.php'; 


$salida = "";
$query = "SELECT * FROM users WHERE username not LIKE '' ORDER BY id LIMIT 5";
if (isset($_POST['consulta'])) {
    $q = mysqli_real_escape_string($con,$_POST['consulta']);
    $query = "SELECT * FROM users WHERE id LIKE '%$q%' or first_name LIKE '%$q%' OR username LIKE '%$q%' or email LIKE '%$q%'";
}
$resultado = mysqli_query($con, $query);
if (mysqli_num_rows($resultado) > 0) {
    $salida .= "<table border=1 class='tabla_datos'>
        <thead>
            <tr id='titulo'>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>USUARIO</td>
                <td>EMAIL</td>
            </tr>
        </thead>
<tbody>";
    while ($fila = mysqli_fetch_array($resultado)) {
        $salida .= "<tr>
    <td>" . $fila['id'] . "</td>
    <td>" . $fila['first_name'] . "</td>
    <td>" . $fila['username'] . "</td>
    <td>" . $fila['email'] . "</td>
    
    
    </tr>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "NO hay datos en la tabla : C";
}

echo $salida;-->
