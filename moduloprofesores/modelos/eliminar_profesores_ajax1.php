<?php
require '../../modelo/conexion.php';
$cadena="";

if (isset($_GET['txtSearch'])) {
	$txtSearch = addslashes($_GET['txtSearch']);
	$sql = "delete from profesores where login='".$txtSearch."'";
	//header("Location: ../index.php?controlador=profesores&accion=listar");

	try{
		@ $db = new mysqli($servidor, $usuario, $contrasenia);
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
		
		$db->select_db($bd);
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);

		if ($db->query($sql) === false)
			throw new ExcepcionEnTransaccion();
		$db->commit();
		
		$sql = "SELECT * FROM profesores";
		$resultado = $db->query($sql);
		if ($db->errno != 0)
			throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
			
		$cadena.="<table border='1'>";
		$cadena.="<tr>";
			$cadena.="<th>Login</th>";
			$cadena.="<th>Password</th>";
			$cadena.="<th>Nombre</th>";
			$cadena.="<th>Apellido</th>";
			$cadena.="<th>DNI</th>";
			$cadena.="<th>email</th>";
			$cadena.="<th>Telefono</th>";
			$cadena.="<th>Sexo</th>";
		$cadena.="</tr>";
		while ($obj = $resultado->fetch_object()){		
			LimpiaResultados($obj);
			$cadena.="<tr>";
				$cadena.="<td>".$obj->login.'</td>';
				$cadena.="<td>".$obj->password.'</td>';
				$cadena.="<td>".$obj->nombre.'</td>';
				$cadena.="<td>".$obj->apellido.'</td>';
				$cadena.="<td>".$obj->dni.'</td>';
				$cadena.="<td>".$obj->email.'</td>';
				$cadena.="<td>".$obj->telefono.'</td>';
				$cadena.="<td>".$obj->sexo.'</td>';
			$cadena.="</tr>";
		} 
		$cadena.="</table>";
		$db->close(); 
	}catch (ExcepcionEnTransaccion $e){
		echo 'No se ha podido realizar la baja';
		$db->rollback();
		$db->close();
	}catch (Exception $e){
		echo $e->getMessage();
		if (mysqli_connect_errno() == 0)
			$db->close();
		exit();
	}
}
echo $cadena;

?>
