<?php
require '../../modelo/conexion.php';
$cadena="";

if (isset($_GET['txtSearch'])) {
	$txtSearch = addslashes($_GET['txtSearch']);
	$sql = "delete from coches where matricula='".$txtSearch."'";
//	$txtSearch="";

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
		
		$sql = "SELECT * FROM coches";
		$resultado = $db->query($sql);
		if ($db->errno != 0)
			throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
			
		$cadena.="<table border='1'>";
		$cadena.='<tr>';
				$cadena.='<th style="color:#00afff";>Matricula</th>';
				$cadena.='<th style="color:#00afff";>Marca</th>';
				$cadena.='<th style="color:#00afff";>Modelo</th>';
				$cadena.='<th style="color:#00afff";>Color</th>';
		$cadena.='</tr>';
		while ($obj = $resultado->fetch_object()){		
			LimpiaResultados($obj);
			$cadena.='<tr>';
					$cadena.='<td align="center">'.$obj->matricula.'</td>';
					$cadena.='<td align="center">'.$obj->marca.'</td>';
					$cadena.='<td align="center">'.$obj->modelo.'</td>';
					$cadena.='<td align="center">'.$obj->color.'</td>';
			$cadena.='</tr>';
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
