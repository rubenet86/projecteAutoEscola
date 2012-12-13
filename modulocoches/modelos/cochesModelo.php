<?php
function buscarTodosLosCoches(){
	global $servidor, $bd, $usuario, $contrasenia;
	try{
		@ $db = new mysqli($servidor, $usuario, $contrasenia);
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
		
		$db->select_db($bd);
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
			
		$resultado = $db->query('SELECT * FROM coches');
		if ($db->errno != 0)
			throw new Exception('Error realizando consulta:'.$db->error, $db->errno); 
		$db->close(); 
	}catch (Exception $e){
		echo $e->getMessage();
		if (mysqli_connect_errno() == 0)
			$db->close();
		exit();
	}	
	return $resultado;
}

function altaCoche($coche){
	global $servidor, $bd, $usuario, $contrasenia;
	try{
		@ $db = new mysqli($servidor, $usuario, $contrasenia);
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
		$db->select_db($bd);
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
			
		$consulta = "insert into coches (matricula,marca,modelo,color) values ('$coche->matricula','$coche->marca','$coche->modelo','$coche->color')";
		if ($db->query($consulta) === false)
		throw new ExcepcionEnTransaccion();
	
		$db->commit();
		$db->close();
	}catch (ExcepcionEnTransaccion $e){
		echo 'No se ha podido realizar el alta';
		$db->rollback();
		$db->close();
	}catch (Exception $e){
		echo $e->getMessage();
		if (mysqli_connect_errno() == 0)
			$db->close();
		exit();
	}		
}

function modificaCoche($coche){
	//alert($coche->login);
	global $servidor, $bd, $usuario, $contrasenia;
	try{
	@ $db = new mysqli($servidor, $usuario, $contrasenia);
	if (mysqli_connect_errno() != 0)
		throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
	
	$db->select_db($bd);
	if ($db->errno != 0)
		throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
	$consulta = "update coches set marca='".$coche->marca."', modelo='".$coche->modelo."', color='".$coche->color."' where matricula='".$coche->matricula."'";
	//echo "$consulta";
	//$consulta = "update items set item='".$item."' where id_item='".$id."'";
	if ($db->query($consulta) === false)
		throw new ExcepcionEnTransaccion();
	$db->commit();
	
	//header ("Location:../../index.php?controlador=coches&accion=listar");
	$db->close(); 
}catch (ExcepcionEnTransaccion $e){
	echo 'No se ha podido realizar la modificacion';
	$db->rollback();
	$db->close();
}catch (Exception $e){
	echo $e->getMessage();
	if (mysqli_connect_errno() == 0)
		$db->close();
	exit();
}
}
?>
