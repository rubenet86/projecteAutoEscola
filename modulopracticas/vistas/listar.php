<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head>
<body>
	<section id="tablaResultadoCoches">
	<table border="1">
		<tr>
			<th>Num. Practica</th>
			<th>Alumno</th>
			<th>Profesor</th>
			<th>Coche</th>
			<th>Fecha</th>
		</tr>
		<?php while ($obj = $practicas->fetch_object()){		
				LimpiaResultados($obj);
		?>
		
			<tr>
				<td><?php echo $obj->numPractica?></td>
				<td><?php echo $obj->alumno?></td>
				<td><?php echo $obj->profesor?></td>
				<td><?php echo $obj->coche?></td>
				<td><?php echo $obj->fecha?></td>
			</tr>
		<?php } ?>
	</table>
	</section>
</body>
</html>

