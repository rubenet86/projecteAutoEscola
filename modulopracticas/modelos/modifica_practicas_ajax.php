<?php
require_once '../modelos/practicasModelo.php';
$accion = 1;
require '../../modelo/conexion.php';
$resultadoAlumnos = resultadoAlumnos();
$resultadoProfesores = resultadoProfesores();
$resultadoCoches = resultadoCoches();

if ($_GET["mas"] != "") {
	if ($_GET["mas"] != "all")
		$mas = "limit 0," . $_GET["mas"];
	else
		$mas = "limit 0,100";
} else
	$mas = "limit 0,10";

if ($_GET["radio1"] == "true")
	$orden = "desc";
else if ($_GET["radio2"] == "true")
	$orden = "asc";
else
	$orden = "asc";

if ($_GET["criterio_ord"] != "")
	$criterio_ord = $_GET['criterio_ord'];
else
	$criterio_ord = "id";

$sql = "SELECT * FROM practicas order by $criterio_ord " . $orden . " " . $mas;
if ($_GET["text"] != "") {
	$text = "%" . $_GET["text"] . "%";
	$sql = "SELECT * FROM practicas where numPractica like '$text' order by $criterio_ord " . $orden . " " . $mas;
} else if ($_GET["text"] == "")//el us no introduce nada en el input text
	$sql = "select * from practicas where numPractica not LIKE '%'";

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

	if ($resultado -> num_rows > 1) {
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<form name="formulario" action="../controlador/index.php?controlador=practicas&accion=recogeDatosModifica" method="post">';
		$cadena .= '<table border="1">';
		$cadena .= '<tr>';
		$cadena .= "<th>Num. Practica</th>";
		$cadena .= "<th>Alumno</th>";
		$cadena .= "<th>Profesor</th>";
		$cadena .= "<th>Coche</th>";
		$cadena .= "<th>Fecha</th>";
		$cadena .= '</tr>';
		while ($obj = $resultado -> fetch_object()) {
			LimpiaResultados($obj);

			$cadena .= '<tr>';
			$cadena .= '<td align="center"><input type="text" name="numPractica" size="13" value=' . $obj -> numPractica . ' readonly></td>';
			$cadena .= '<td align="center"><input type="text" name="loginA" size="13" value=' . $obj -> alumno . ' readonly></td>';
			$cadena .= '<td align="center"><input type="text" name="loginP" size="13" value=' . $obj -> profesor . ' readonly></td>';
			$cadena .= '<td align="center"><input type="text" name="matricula" size="13" value=' . $obj -> coche . ' readonly></td>';
			$cadena .= '<td align="center"><input type="text" name="fecha" size="13" value=' . $obj -> fecha . ' readonly></td>';
			$cadena .= '</tr>';
		}
		$cadena .= '</table>';
	} else if ($resultado -> num_rows == 1) {
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<form name="formulario" action="../controlador/index.php?controlador=practicas&accion=recogeDatosModifica" method="post">';
		$cadena .= '<table border="1">';
		$cadena .= '<tr>';
		$cadena .= "<th>Num. Practica</th>";
		$cadena .= "<th>Alumno</th>";
		$cadena .= "<th>Profesor</th>";
		$cadena .= "<th>Coche</th>";
		$cadena .= "<th>Fecha</th>";
		$cadena .= '</tr>';
		while ($obj = $resultado -> fetch_object()) {
			LimpiaResultados($obj);

			$cadena .= '<tr>';
			$cadena .= '<td align="center"><input type="text" name="numPractica" size="13" value=' . $obj -> numPractica . ' readonly></td>';
			$cadena .= '<td align="center"><select name="loginA">';
			if ($resultadoAlumnos -> num_rows > 0) {
				while ($objA = $resultadoAlumnos -> fetch_object()) {
					LimpiaResultados($objA);

					$cadena .= '<option  value=' . $objA -> login . '>' . $objA -> login . '</option>';
				}
			}
			$cadena .= '</select></td>';
			$cadena .= '<td align="center"><select name="loginP">';
			if ($resultadoProfesores -> num_rows > 0) {
				while ($objB = $resultadoProfesores -> fetch_object()) {
					LimpiaResultados($objB);

					$cadena .= '<option  value=' . $objB -> login . '>' . $objB -> login . '</option>';
				}
			}
			$cadena .= '</select></td>';

			$cadena .= '<td align="center"><select name="matricula">';
			if ($resultadoCoches -> num_rows > 0) {
				while ($objC = $resultadoCoches -> fetch_object()) {
					LimpiaResultados($objC);

					$cadena .= '<option  value=' . $objC -> matricula . '>' . $objC -> matricula . '</option>';
				}
			}
			$cadena .= '</select></td>';

			$cadena .= '<td align="center"><input type="text" value=' . $obj -> fecha . ' id="date" name="fecha" size="10"/></td>';

			$cadena .= '</tr>';
		}
		$cadena .= '</table>';

		$cadena .= '<input type="submit" id="botoModifica" name="modifica" value="Modifica">';

		$cadena .= '</form>';

	}
	$resultado -> free();
	$resultadoAlumnos -> free();
	$db -> close();
} catch (Exception $e) {
	echo $e -> getMessage();
	if (mysqli_connect_errno() == 0)
		$db -> close();
	exit();
}
echo utf8_encode($cadena);
?>
