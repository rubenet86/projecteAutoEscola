<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head>
<body>
	<section id="tablaResultadoCoches">
	<table border="1">
		<tr>
			<th>Matricula</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Color</th>	
		</tr>
		<?php while ($obj = $coches->fetch_object()){		
				LimpiaResultados($obj);
		?>
		
			<tr>
				<td><?php echo $obj->matricula?></td>
				<td><?php echo $obj->marca?></td>
				<td><?php echo $obj->modelo?></td>
				<td><?php echo $obj->color?></td>
			</tr>
		<?php } ?>
	</table>
	</section>
</body>
</html>

