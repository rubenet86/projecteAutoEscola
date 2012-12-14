<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Modificacion de encuestas</title>
		<style type="text/css"></style>
		<script language="javascript" src="../moduloprofesores/js/modificar_profesores.js" type="text/javascript"></script>
		<script language="javascript" src="../javascript/validar.js" type="text/javascript"></script>
	</head>
	<body>
		<form id="form3" name="form3" method="get" action="" onsubmit="return false;">
			<br>
			<br>
			<table width="92%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="4" align="center" valign="middle"><label> Login profesor:
						<input name="buscar" type="text" id="buscar" autocomplete="off"/>
					</label></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4" align="center">
					<table width="300" border="0" cellspacing="0" cellpadding="0" style="font-size:14px">
						<tr>
							<td align="center"><label>
								<input type="radio" name="radio" id="radio1" value="radio1"/>
								Desc</label></td>
							<td align="center"><label>
								<input type="radio" name="radio" id="radio2" value="radio2"/>
								Asc</label></td>
							<td align="center"><label>
								<select name="criterio_ord" id="criterio_ord" >
									<option value="login" >Login</option>
									<option value="nombre" >Nombre</option>
									<option value="apellido" >Apellido</option>
									<option value="dni" >DNI</option>
									<option value="email" >email</option>
									<option value="telefono" >Telefono</option>
									<option value="sexo" >Sexo</option>
								</select> </label></td>
						</tr>
					</td>
				</tr>
			</table>
		</form>
		<div id="resultado3"></div>
	</body>
</html>