<?php
require '../../modelo/conexion.php';
;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<style type="text/css">
			<!--body{padding-top: 20px;}-->
		</style>
	</head>
	<body>

		<?php
		if ((isset($_GET['id']) === true) && (isset($_GET['modifica']) === false)) {
			$id = $_GET['id'];
			echo '<br>';
			echo '<br>';
			echo '<br>';
			echo '<br>';

		} else {
			$matricula = $_POST['matricula'];
			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$color = $_POST['color'];
			try {
				@$db = new mysqli($servidor, $usuario, $contrasenia);
				if (mysqli_connect_errno() != 0)
					throw new Exception('Error conectando:' . mysqli_connect_error(), mysqli_connect_errno());

				$db -> select_db($bd);
				if ($db -> errno != 0)
					throw new Exception('Error seleccionando bd:' . $db -> error, $db -> errno);
				$consulta = "update coches set marca='" . $marca . "', modelo='" . $modelo . "', color='" . $color . "' where matricula='" . $matricula . "'";

				if ($db -> query($consulta) === false)
					throw new ExcepcionEnTransaccion();
				$db -> commit();

				header("Location:../../index.php?controlador=coches&accion=listar");
				$db -> close();
			} catch (ExcepcionEnTransaccion $e) {
				echo 'No se ha podido realizar la modificacion';
				$db -> rollback();
				$db -> close();
			} catch (Exception $e) {
				echo $e -> getMessage();
				if (mysqli_connect_errno() == 0)
					$db -> close();
				exit();
			}
		}
	?>
	</body>
</html>
