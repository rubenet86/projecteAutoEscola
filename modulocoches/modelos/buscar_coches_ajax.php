<?php
require '../../modelo/conexion.php';

if ($_GET["radio1"] == "true")
	$orden = "desc";
else if ($_GET["radio2"] == "true")
	$orden = "asc";
else
	$orden = "asc";

if ($_GET["criterio_ord"] != "")
	$criterio_ord = $_GET['criterio_ord'];
else
	$criterio_ord = "matricula";

$sql = "SELECT * FROM coches order by $criterio_ord " . $orden;
if ($_GET["matricula"] != "") {
	$matricula = "%" . $_GET["matricula"] . "%";
	$sql = "SELECT * FROM coches where matricula like '$matricula' order by $criterio_ord " . $orden;
} else if ($_GET["matricula"] == "")//el us no introduce nada en el input text
	$sql = "select * from coches where matricula not LIKE '%'";

$cadena = "";
try {
	@$db = new mysqli($servidor, $usuario, $contrasenia);
	if (mysqli_connect_errno() != 0)
		throw new Exception('Error conectando:' . mysqli_connect_error(), mysqli_connect_errno());

	$db -> select_db($bd);
	if ($db -> errno != 0)
		throw new Exception('Error seleccionando bd:' . $db -> error, $db -> errno);

	$resultado = $db -> query($sql);
	if ($db -> errno != 0)
		throw new Exception('Error realizando consulta:' . $db -> error, $db -> errno);

	if ($resultado -> num_rows > 0) {
		$cadena .= '<table id="tablaModifica">';
		$cadena .= '<tr>';
		$cadena .= '<th>Matricula</th>';
		$cadena .= '<th>Marca</th>';
		$cadena .= '<th>Modelo</th>';
		$cadena .= '<th>Color</th>';
		$cadena .= '</tr>';
		while ($obj = $resultado -> fetch_object()) {
			LimpiaResultados($obj);
			$cadena .= '<tr>';
			$cadena .= '<td align="center">' . $obj -> matricula . '</td>';
			$cadena .= '<td align="center">' . $obj -> marca . '</td>';
			$cadena .= '<td align="center">' . $obj -> modelo . '</td>';
			$cadena .= '<td align="center">' . $obj -> color . '</td>';
			$cadena .= '</tr>';
		}
		$cadena .= '</table>';
	}
	$resultado -> free();
	$db -> close();
} catch (Exception $e) {
	echo $e -> getMessage();
	if (mysqli_connect_errno() == 0)
		$db -> close();
	exit();
}
echo utf8_encode($cadena);
?>
