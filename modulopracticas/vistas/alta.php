<div id="tabla">
	<form name="formulario" action="../controlador/index.php?controlador=practicas&accion=recogeDatosAlta" method="POST">
		<?php
if ($NumPracticas->num_rows == 0){

		?>
		<p>Numero practica----->:
		<input type="text" name="numPractica" maxlength="3" size="2" readonly value="1">
		<?php
		}else if ($NumPracticas->num_rows > 0){
		$obj= $NumPracticas->fetch_object();
		?>
		<p>
			Numero practica----->:
			<input type="text" name="numPractica" maxlength="3" size="2" readonly value="<?php echo $obj->numPractica+1 ?>">
			<?php
			}
			?>
		</p>
		<p>Alumno:------------->
		<select name="loginA">
		<?php
if ($resultadoAlumnos->num_rows > 0){
while ( $obj= $resultadoAlumnos->fetch_object()){
LimpiaResultados($obj);

		?>
		<option value="<?php echo $obj->login ?>" ><?php echo $obj->login
		?>
		</option>
		<?php
		}
		}
		?>
		</select>
		</p>
		<p>Profesor:------------>
		<select name="loginP">
		<?php

if ($resultadoProfesores->num_rows > 0){
while ( $obj= $resultadoProfesores->fetch_object()){
LimpiaResultados($obj);
		?>
		<option value="<?php echo $obj->login ?>" ><?php echo $obj->login ?></option>
		<?php
		}
		}
		?>
		</select>
		</p>
		<p>Coche:---------->
		<select name="matricula">
		<?php
if ($resultadoCoches->num_rows > 0){
while ( $obj= $resultadoCoches->fetch_object()){
LimpiaResultados($obj);
		?>
		<option value="<?php echo $obj->matricula ?>" ><?php echo $obj->matricula ?></option>
		<?php
		}
		}
		?>
		</select>
		</p>
		
		<div id="calendar-container" style="float: left">
			<p>
				Fecha:-------->
				<input type="text" id="date" name="fecha" size="10"/>
				<br>
				<br>
			</p>
		</div>
		<br>
		<br><br><br><br><br><br><br><br><br><br><br>
		<INPUT TYPE="submit" NAME="nueva" VALUE="Nueva practica" />
	</FORM>
</div>