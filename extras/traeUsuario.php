<!--

require_once '../inc/db.php';

$query = "SELECT *FROM users ";
$consulta = mysqli_query($con, $query);

$tabla = "";

while ($row = mysqli_fetch_array($consulta)) {
    $editar = '<a href=\"edicionUsuario.php?a=' . $row['username'] . '&b=' . $row['Password'] . '&c=' . $row['first_name'] . '&d=' . $row['date'] . '\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
    $eliminar = '<a href=\"actionDelete.php?id=' . $row['username'] . '\" onclick=\"return confirm(\'¿Seguro que desea eliminiar este usuario?\')\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';

    $tabla .= '{
				  "id":"' . $row['id'] . '",
				  "date":"' . $row['date'] . '",
				  "first_name":"' . $row['first_name'] . '",
				  "username":"' . $row['username'] . '",
				  "clave":"' . $row['clave'] . '",
				  "acciones":"' . $editar . $eliminar . '"
				},';
}
//eliminamos la coma que sobra
$tabla = substr($tabla, 0, strlen($tabla) - 1);
echo '{"data":[' . $tabla . ']}';
-->
