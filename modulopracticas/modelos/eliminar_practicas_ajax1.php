<?php
require '../../modelo/conexion.php';
$cadena = "";

if (isset($_GET['txtSearch'])) {
	$txtSearch = addslashes($_GET['txtSearch']);
	$sql = "delete from practicas where numPractica='" . $txtSearch . "'";

	try {
		@$db = new mysqli($servidor, $usuario, $contrasenia);
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:' . mysqli_connect_error(), mysqli_connect_errno());

		$db -> select_db($bd);
		if ($db -> errno != 0)
			throw new Exception('Error seleccionando bd:' . $db -> error, $db -> errno);

		if ($db -> query($sql) === false)
			throw new ExcepcionEnTransaccion();
		$db -> commit();

		$sql = "SELECT * FROM practicas";
		$resultado = $db -> query($sql);
		if ($db -> errno != 0)
			throw new Exception('Error realizando consulta:' . $db -> error, $db -> errno);

		$cadena .= "<table border='1'>";
		$cadena .= "<tr>";
		$cadena .= "<th>Num. Practica</th>";
		$cadena .= "<th>Alumno</th>";
		$cadena .= "<th>Profesor</th>";
		$cadena .= "<th>Coche</th>";
		$cadena .= "<th>Fecha</th>";
		$cadena .= "</tr>";
		while ($obj = $resultado -> fetch_object()) {
			LimpiaResultados($obj);
			$cadena .= "<tr>";
			$cadena .= "<td>" . $obj -> numPractica . '</td>';
			$cadena .= "<td>" . $obj -> alumno . '</td>';
			$cadena .= "<td>" . $obj -> profesor . '</td>';
			$cadena .= "<td>" . $obj -> coche . '</td>';
			$cadena .= "<td>" . $obj -> fecha . '</td>';
			$cadena .= "</tr>";
		}
		$cadena .= "</table>";
		$db -> close();
	} catch (ExcepcionEnTransaccion $e) {
		echo 'No se ha podido realizar la baja';
		$db -> rollback();
		$db -> close();
	} catch (Exception $e) {
		echo $e -> getMessage();
		if (mysqli_connect_errno() == 0)
			$db -> close();
		exit();
	}
}
echo $cadena;
?>
