<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head>
<body>
	<section id="tablaResultado">
	<table border="1">
		<tr>
			<th>Login</th>
			<th>Password</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>DNI</th>
			<th>email</th>
			<th>Telefono</th>
			<th>Sexo</th>
			
		</tr>
		<?php while ($obj = $profesores->fetch_object()){		
				LimpiaResultados($obj);
		?>
		
			<tr>
				<td><?php echo $obj->login?></td>
				<td><?php echo $obj->password?></td>
				<td><?php echo $obj->nombre?></td>
				<td><?php echo $obj->apellido?></td>
				<td><?php echo $obj->dni?></td>
				<td><?php echo $obj->email?></td>
				<td><?php echo $obj->telefono?></td>
				<td><?php echo $obj->sexo?></td>
			</tr>
		<?php } ?>
	</table>
	</section>
</body>
</html>

