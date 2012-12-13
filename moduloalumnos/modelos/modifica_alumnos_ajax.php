<?php
$accion = 1;
require '../../modelo/conexion.php';

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

$sql = "SELECT * FROM alumnos order by $criterio_ord " . $orden . " " . $mas;
if ($_GET["text"] != "") {
	$text = "%" . $_GET["text"] . "%";
	$sql = "SELECT * FROM alumnos where login like '$text' order by $criterio_ord " . $orden . " " . $mas;
} else if ($_GET["text"] == "")//el us no introduce nada en el input text
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
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<br>';
		$cadena .= '<form name="formulario" action="../controlador/index.php?controlador=alumnos&accion=recogeDatosModifica" method="post">';
		$cadena .= '<table id="tablaModifica" border="1">';
		$cadena .= '<tr>';
		$cadena .= '<th style="color:#00afff";>Login</th>';
		$cadena .= '<th style="color:#00afff";>Password</th>';
		$cadena .= '<th style="color:#00afff";>Nombre</th>';
		$cadena .= '<th style="color:#00afff";>Apellido</th>';
		$cadena .= '<th style="color:#00afff";>DNI</th>';
		$cadena .= '<th style="color:#00afff";>email</th>';
		$cadena .= '<th style="color:#00afff";>Telefono</th>';
		$cadena .= '<th style="color:#00afff";>Sexo</th>';
		$cadena .= '</tr>';
		while ($obj = $resultado -> fetch_object()) {
			LimpiaResultados($obj);

			$cadena .= '<tr>';
			$cadena .= '<td align="center"><input type="text" name="login" size="13" value=' . $obj -> login . ' readonly></td>';
			$cadena .= '<td align="center"><input type="text" name="password" size="13" value=' . $obj -> password . '  onkeyup="valida_envia(this)"></td>';
			$cadena .= '<td align="center"><input type="text" name="nombre" size="13" value=' . $obj -> nombre . ' onkeyup="valida_envia(this)"></td>';
			$cadena .= '<td align="center"><input type="text" name="apellido" size="13" value=' . $obj -> apellido . ' onkeyup="valida_envia(this)"></td>';
			$cadena .= '<td align="center"><input type="text" name="dni" size="13" value=' . $obj -> dni . ' onkeyup="valida_envia(this)"></td>';
			$cadena .= '<td align="center"><input type="text" name="email" size="13" value=' . $obj -> email . ' onkeyup="valida_envia(this)"></td>';
			$cadena .= '<td align="center"><input type="text" name="telefono" size="13" value=' . $obj -> telefono . ' onkeyup="valida_envia(this)"></td>';
			$cadena .= '<td align="center"><select name="sexo">
												<option value="Hombre">Hombre</option>
												<option value="Mujer">Mujer</option>			
												</select></td>';
			$cadena .= '</tr>';
		}
		$cadena .= '</table>';
		if ($resultado -> num_rows == 1)
			$cadena .= '<input type="button" id="botoModifica" name="modifica" value="Modifica" onclick="enviar_coche()">';
		$cadena .= '<form>';
		$cadena .= '<section id="divErrores">';
		$cadena .= '<section id="divPassword"></section>';
		$cadena .= '<section id="divNombre"></section>';
		$cadena .= '<section id="divApellido"></section>';
		$cadena .= '<section id="divDNI"></section>';
		$cadena .= '<section id="divEmail"></section>';
		$cadena .= '<section id="divTelefono"></section>';
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
