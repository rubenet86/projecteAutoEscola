<section id="tabla">

	<form name="formulario" action="../controlador/index.php?controlador=coches&accion=recogeDatosAlta" method="post">
		<TABLE>
			<TR>
				<TD>Matricula:</TD>
				<TD>
				<INPUT TYPE="text" NAME="matricula" SIZE="20" MAXLENGTH="30" onkeyup="valida_coche(this)" required>
				</TD>
				<TD><section id="divMatricula"></section></TD>
			</TR>
			<TR>
				<TD>Marca:</TD>
				<TD>
				<INPUT TYPE="text" NAME="marca" SIZE="20" MAXLENGTH="30" onkeyup="valida_coche(this)" required>
				</TD>
				<TD><section id="divMarca"></section></TD>
			</TR>
			<TR>
				<TD>Modelo:</TD>
				<TD>
				<INPUT TYPE="text" NAME="modelo" SIZE="20" MAXLENGTH="30" required>
				</TD>
			</TR>
			<TR>
				<TD>Color:</TD>
				<TD>
				<INPUT TYPE="text" NAME="color" SIZE="20" MAXLENGTH="30" onkeyup="valida_coche(this)" required>
				</TD>
				<TD><section id="divColor"></section></TD>
			</TR>
		</TABLE>
		<INPUT TYPE="button" NAME="alta" VALUE="Alta" onclick="enviar_coche()">
	</FORM>
</section>
