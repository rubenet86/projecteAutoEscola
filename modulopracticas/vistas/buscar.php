<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css"></style>
	<script language="javascript" src="../modulopracticas/js/buscar_practicas.js" type="text/javascript"></script>
</head>
<body>
	<form id="form1" name="form1" method="get" action="" onsubmit="return false;">
		<br><br>
		<table width="92%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="4" align="center" valign="middle"><label>
				Num. Practica: <input name="buscar" type="text" id="numPractica" autocomplete="off"/></label></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td colspan="4" align="center"><table width="300" border="0" cellspacing="0" cellpadding="0" style="font-size:14px">
					<tr>
					  <td align="center"><label><input type="radio" name="radio" id="radio1" value="radio1"/>Desc</label></td>
					  <td align="center"><label><input type="radio" name="radio" id="radio2" value="radio2"/>Asc</label></td>
					  <td align="center"><label>
						<select name="criterio_ord" id="criterio_ord" >
							<option value="numPractica" >Login</option>	
							<option value="alumno" >Nombre</option>	
							<option value="profesor" >Apellido</option>	
							<option value="coche" >DNI</option>	
							<option value="fecha" >email</option>			
						</select>
					  </label></td>
					  <td align="center"><label>
						<select name="mas" id="mas" >
						  <option value="10">10</option>
						  <option value="20">20</option>
						  <option value="all">Todos</option>
						</select>
					  </label></td>
					</tr>
				</td>
				<td>&nbsp;</td>
				
			</tr>
		</table>
		<div id="resultados"></div><br>
	</form>
</body>
</html>

