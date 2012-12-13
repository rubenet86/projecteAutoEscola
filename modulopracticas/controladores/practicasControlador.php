<?php
 	require_once '../modelo/conexion.php';
	require_once '../libreria.inc';
	require_once '../modulopracticas/modelos/practicasModelo.php';
	

function listar(){
	//Incluye el modelo que corresponde
	//require '../modulopracticas/modelos/practicasModelo.php';

	//Le pide al modelo todos los items
	$practicas = buscarTodasLasPracticas();

	//Pasa a la vista toda la información que se desea representar
	require_once '../modulopracticas/vistas/listar.php';
}
function alta(){
	$NumPracticas = numeroPracticas();
	$resultadoAlumnos = resultadoAlumnos();
	$resultadoProfesores = resultadoProfesores();
	$resultadoCoches = resultadoCoches();
	
	require_once '../modulopracticas/vistas/alta.php';
	
	
}

function recogeDatosAlta(){
	$practica = new Practica;
	$practica->numPractica=$_POST['numPractica'];
	$practica->loginAlumno=$_POST['loginA'];
	$practica->loginProfesor=$_POST['loginP'];
	$practica->matricula=$_POST['matricula'];
	$practica->fecha=$_POST['fecha'];

	print_r($_POST);
	altaPractica($practica);	
	
	header("Location: ./index.php?controlador=practicas&accion=listar");
}

function recogeDatosModifica(){
	$practica = new Practica;
	$practica->loginAlumno=$_POST['loginA'];
	$practica->loginProfesor=$_POST['loginP'];
	$practica->matricula=$_POST['matricula'];
	$practica->fecha=$_POST['fecha'];
	
	print_r($_POST);
	modificaPractica($practica);	
		
	//header("Location: ./index.php?controlador=practicas&accion=listar");
}


function buscar(){
	require '../modulopracticas/vistas/buscar.php';
}
function eliminar(){
	require '../modulopracticas/vistas/eliminar.php';
	
	
}

function modificar(){
	
	
	require_once '../modulopracticas/vistas/modificar.php';
}
?>
