<?php 
class Alumno{
	var $login;
	var $password;
	var $nombre;
	var $apellido;
	var $dni;
	var $email;
	var $telefono;
	var $sexo;
}

class Profesor{
	var $login;
	var $password;
	var $nombre;
	var $apellido;
	var $dni;
	var $email;
	var $telefono;
	var $sexo;
}

class Coche{
	var $matricula;
	var $marca;
	var $modelo;
	var $color;
}

class Practica{
	var $numPractica;
	var $loginAlumno;
	var $loginProfesor;
	var $matricula;
	var $fecha;
}
function alert($texto){
	echo "<script>alert('".$texto."');</script>";
}

?>
