<?php
$accion = 1;
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
	$criterio_ord = "id";

$sql = "SELECT * FROM coches order by $criterio_ord " . $orden;
if ($_GET["text"] != "") {
	$text = "%" . $_GET["text"] . "%";
	$sql = "SELECT * FROM coches where matricula like '$text' order by $criterio_ord " . $orden;
} else if ($_GET["text"] == "")//el us no introduce nada en el input text
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
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<form name="formulario" action="../controlador/index.php?controlador=coches&accion=recogeDatosModifica" method="post">';
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
			$cadena .= '<td align="center"><input type="text" name="matricula" size="13" value=' . $obj -> matricula . ' readonly></td>';
			$cadena .= '<td align="center"><input type="text" name="marca" size="13" value=' . $obj -> marca . '  onkeyup="valida_coche(this)"></td>';
			$cadena .= '<td align="center"><input type="text" name="modelo" size="13" value=' . $obj -> modelo . ' onkeyup="valida_coche(this)"></td>';
			$cadena .= '<td align="center"><input type="text" name="color" size="13" value=' . $obj -> color . ' onkeyup="valida_coche(this)"></td>';

			$cadena .= '</tr>';
		}
		$cadena .= '</table>';
		if ($resultado -> num_rows == 1)
			$cadena .= '<input type="button" id="botoModifica" name="modifica" value="Modifica" onclick="enviar_coche()">';
		$cadena .= '<form>';
		$cadena .= '<section id="divErrores">';
		$cadena .= '<section id="divMarca"></section>';
		$cadena .= '<section id="divModelo"></section>';
		$cadena .= '<section id="divColor"></section>';
		$cadena .= '</section>';

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
