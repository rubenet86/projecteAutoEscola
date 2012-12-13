<?php 
require '../../modelo/conexion.php';;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css"><!--body{padding-top: 20px;}--></style>
</head>
<body>

<?php
if( (isset($_GET['id'])===true )&&(isset($_GET['modifica'])===false ) ) {
$id=$_GET['id'];
echo '<br>';echo '<br>';echo '<br>';echo '<br>';
/*
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
		<TABLE>
			<TR>
				<TD>Login:</TD>
				<TD>
				<INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="30" title="Escribe su login" onblur="valida_envia(this)" required>
				</TD>
				<TD><section id="divLogin"></section></TD>
			</TR>
			<TR>
				<TD>Password:</TD>
				<TD>
				<INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="30" title="Escribe su password" onblur="valida_envia(this)" required>
				</TD>
				<TD><section id="divPassword"></section></TD>
			</TR>
			<TR>
				<TD>Nombre:</TD>
				<TD>
				<INPUT TYPE="text" NAME="nombre" SIZE="20" MAXLENGTH="30" title="Escribe su nombre" onblur="valida_envia(this)" required>
				</TD>
				<TD><section id="divNombre"></section></TD>
			</TR>
			<TR>
				<TD>Apellido:</TD>
				<TD>
				<INPUT TYPE="text" NAME="apellido" SIZE="20" MAXLENGTH="30" title="Escribe su apellido" onblur="valida_envia(this)" required>
				</TD>
				<TD><section id="divApellido"></section></TD>
			</TR>
			<TR>
			<TR>
				<TD>DNI:</TD>
				<TD>
				<INPUT TYPE="text" NAME="dni" SIZE="20" MAXLENGTH="30" title="Escribe su DNI" onblur="valida_envia(this)" required>
				</TD>
				<TD><section id="divDNI"></section></TD>
			</TR>
			<TD>email:</TD>
			<TD>
			<INPUT TYPE="email" NAME="email" SIZE="20" MAXLENGTH="30" title="Escribe su email" onblur="valida_envia(this)" required>
			</TD>
			<TD><section id="divEmail"></section></TD>
			</TR>
			</TR>
			<TD>Telefono:</TD>
			<TD>
			<INPUT TYPE="tel" NAME="telefono" SIZE="20" MAXLENGTH="30" title="Escribe su telefono" onblur="valida_envia(this)" required>
			</TD>
			<TD><section id="divTelefono"></section></TD>
			</TR>
			<TR>
				<TD>Sexo:</TD>
				<TD>
				<select name="sexo">
					<option value="Hombre">Hombre</option>
					<option value="Mujer">Mujer</option>
				</select></TD>
			</TR>
		</TABLE>
</form>
<?php*/
} else { 
		$login=$_POST['login'];
		$password=$_POST['password'];
		$password=crypt($password,'@j@x');
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$dni=$_POST['dni'];
		$email=$_POST['email'];
		$telefono=$_POST['telefono'];
		$sexo=$_POST['sexo'];
try{
	@ $db = new mysqli($servidor, $usuario, $contrasenia);
	if (mysqli_connect_errno() != 0)
		throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
	
	$db->select_db($bd);
	if ($db->errno != 0)
		throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
	$consulta = "update profesores set password='".$password."', nombre='".$nombre."', apellido='".$apellido."', dni='".$dni."', email='".$email."', telefono=".$telefono.", sexo='".$sexo."' where login='".$login."'";
	//$consulta = "update items set item='".$item."' where id_item='".$id."'";
	if ($db->query($consulta) === false)
		throw new ExcepcionEnTransaccion();
	$db->commit();
	
	header ("Location:../../index.php?controlador=profesores&accion=listar");
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
</body>
</html>