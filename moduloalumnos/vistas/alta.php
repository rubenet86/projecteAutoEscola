<section id="tabla">

	<form name="formulario" action="../controlador/index.php?controlador=alumnos&accion=recogeDatosAlta" method="post">
		<TABLE id="tablaAlta">
			<TR>
				<TD>Login:</TD>
				<TD>
				<INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="30" title="Escribe su login" onkeyup="valida_envia(this)" required>
				<!----></TD>
				<TD><section id="divLogin"></section></TD>
			</TR>
			<TR>
				<TD>Password:</TD>
				<TD>
				<INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="30" title="Escribe su password" onkeyup="valida_envia(this)" required>
				</TD>
				<TD><section id="divPassword"></section></TD>
			</TR>
			<TR>
				<TD>Nombre:</TD>
				<TD>
				<INPUT TYPE="text" NAME="nombre" SIZE="20" MAXLENGTH="30" title="Escribe su nombre" onkeyup="valida_envia(this)" required>
				</TD>
				<TD><section id="divNombre"></section></TD>
			</TR>
			<TR>
				<TD>Apellido:</TD>
				<TD>
				<INPUT TYPE="text" NAME="apellido" SIZE="20" MAXLENGTH="30" title="Escribe su apellido" onkeyup="valida_envia(this)" required>
				</TD>
				<TD><section id="divApellido"></section></TD>
			</TR>
			<TR>
			<TR>
				<TD>DNI:</TD>
				<TD>
				<INPUT TYPE="text" NAME="dni" SIZE="20" MAXLENGTH="30" title="Escribe su DNI" onkeyup="valida_envia(this)" required>
				</TD>
				<TD><section id="divDNI"></section></TD>
			</TR>
			<TD>email:</TD>
			<TD>
			<INPUT TYPE="email" NAME="email" SIZE="20" MAXLENGTH="30" title="Escribe su email" onkeyup="valida_envia(this)" required>
			</TD>
			<TD><section id="divEmail"></section></TD>
			</TR>
			</TR>
			<TD>Telefono:</TD>
			<TD>
			<INPUT TYPE="tel" NAME="telefono" SIZE="20" MAXLENGTH="30" title="Escribe su telefono" onkeyup="valida_envia(this)" required>
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
		<INPUT TYPE="button" NAME="alta" VALUE="Alta" onclick="enviar()">
	</FORM>
</section>
