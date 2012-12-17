<?php
require_once '../modelo/conexion.php';
require_once '../libreria.inc';
require_once '../modulopracticas/modelos/practicasModelo.php';

function listar() {
	//Incluye el modelo que corresponde
	//require '../modulopracticas/modelos/practicasModelo.php';

	//Le pide al modelo todos los items
	$practicas = buscarTodasLasPracticas();

	//Pasa a la vista toda la información que se desea representar
	require_once '../modulopracticas/vistas/listar.php';
	echo '<input id="callbackAlta" type="hidden" value="LISTAR PRACTICAS"></input>';
}

function alta() {
	$NumPracticas = numeroPracticas();
	$resultadoAlumnos = resultadoAlumnos();
	$resultadoProfesores = resultadoProfesores();
	$resultadoCoches = resultadoCoches();

	require_once '../modulopracticas/vistas/alta.php';
	echo '<input id="callbackAlta" type="hidden" value="ALTA PRACTICAS"></input>';
}

function recogeDatosAlta() {
	$practica = new Practica;
	$practica -> numPractica = $_POST['numPractica'];
	$practica -> loginAlumno = $_POST['loginA'];
	$practica -> loginProfesor = $_POST['loginP'];
	$practica -> matricula = $_POST['matricula'];
	$practica -> fecha = $_POST['fecha'];

	//print_r($_POST);
	altaPractica($practica);

	header("Location: ./index.php?controlador=practicas&accion=listar");
}

function recogeDatosModifica() {
	$practica = new Practica;
	$practica -> numPractica = $_POST['numPractica'];
	$practica -> loginAlumno = $_POST['loginA'];
	$practica -> loginProfesor = $_POST['loginP'];
	$practica -> matricula = $_POST['matricula'];
	$practica -> fecha = $_POST['fecha'];

	//print_r($_POST);
	modificaPractica($practica);

	header("Location: ./index.php?controlador=practicas&accion=listar");
}

function buscar() {
	require '../modulopracticas/vistas/buscar.php';
	echo '<input id="callbackAlta" type="hidden" value="BUSCAR PRACTICAS"></input>';
}

function eliminar() {
	require '../modulopracticas/vistas/eliminar.php';
	echo '<input id="callbackAlta" type="hidden" value="ELIMINAR PRACTICAS"></input>';

}

function modificar() {
	require_once '../modulopracticas/vistas/modificar.php';
	echo '<input id="callbackAlta" type="hidden" value="MODIFICAR PRACTICAS"></input>';
}
?>
