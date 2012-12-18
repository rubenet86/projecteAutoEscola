<section id="tablaResultado">
	<table id="tablaModifica">
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
		<?php while ($obj = $alumnos->fetch_object()){		
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