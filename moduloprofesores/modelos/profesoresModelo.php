<?php
function buscarTodosLosProfesores(){
	global $servidor, $bd, $usuario, $contrasenia;
	try{
		@ $db = new mysqli($servidor, $usuario, $contrasenia);
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
		
		$db->select_db($bd);
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
			
		$resultado = $db->query('SELECT * FROM profesores');
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

function altaProfesor($profesor){
	global $servidor, $bd, $usuario, $contrasenia;
	try{
		@ $db = new mysqli($servidor, $usuario, $contrasenia);
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
		$db->select_db($bd);
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
			
		$consulta = "insert into profesores (login,password,nombre,apellido,dni,email,telefono,sexo) values ('$profesor->login','$profesor->password','$profesor->nombre','$profesor->apellido','$profesor->dni','$profesor->email',$profesor->telefono,'$profesor->sexo')";
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

function modificaprofesor($profesor){
	//alert($profesor->login);
	global $servidor, $bd, $usuario, $contrasenia;
	try{
	@ $db = new mysqli($servidor, $usuario, $contrasenia);
	if (mysqli_connect_errno() != 0)
		throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
	
	$db->select_db($bd);
	if ($db->errno != 0)
		throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
	$consulta = "update profesores set password='".$profesor->password."', nombre='".$profesor->nombre."', apellido='".$profesor->apellido."', dni='".$profesor->dni."', email='".$profesor->email."', telefono=".$profesor->telefono.", sexo='".$profesor->sexo."' where login='".$profesor->login."'";
	//echo "$consulta";
	//$consulta = "update items set item='".$item."' where id_item='".$id."'";
	if ($db->query($consulta) === false)
		throw new ExcepcionEnTransaccion();
	$db->commit();
	
	//header ("Location:../../index.php?controlador=profesors&accion=listar");
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
