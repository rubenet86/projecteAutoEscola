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
	$criterio_ord = "login";

$sql = "SELECT * FROM alumnos order by $criterio_ord " . $orden;
if ($_GET["login"] != "") {
	$login = "%" . $_GET["login"] . "%";
	$sql = "SELECT * FROM alumnos where login like '$login' order by $criterio_ord " . $orden;
} else if ($_GET["login"] == "")//el us no introduce nada en el input text
	$sql = "select * from alumnos where login not LIKE '%'";

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
		$cadena .= '<th>Login</th>';
		$cadena .= '<th>Password</th>';
		$cadena .= '<th>Nombre</th>';
		$cadena .= '<th>Apellido</th>';
		$cadena .= '<th>DNI</th>';
		$cadena .= '<th>email</th>';
		$cadena .= '<th>Telefono</th>';
		$cadena .= '<th>Sexo</th>';
		$cadena .= '</tr>';
		while ($obj = $resultado -> fetch_object()) {
			LimpiaResultados($obj);
			$cadena .= '<tr>';
			$cadena .= '<td align="center">' . $obj -> login . '</td>';
			$cadena .= '<td align="center">' . $obj -> password . '</td>';
			$cadena .= '<td align="center">' . $obj -> nombre . '</td>';
			$cadena .= '<td align="center">' . $obj -> apellido . '</td>';
			$cadena .= '<td align="center">' . $obj -> dni . '</td>';
			$cadena .= '<td align="center">' . $obj -> email . '</td>';
			$cadena .= '<td align="center">' . $obj -> telefono . '</td>';
			$cadena .= '<td align="center">' . $obj -> sexo . '</td>';
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
