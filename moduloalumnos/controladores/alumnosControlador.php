<?php
require_once '../modelo/conexion.php';
require_once '../libreria.inc';
require_once '../moduloalumnos/modelos/alumnosModelo.php';

function listar() {
	//Le pide al modelo todos los alumnos
	$alumnos = buscarTodosLosAlumnos();

	//Pasa a la vista toda la información que se desea representar
	require_once '../moduloalumnos/vistas/listar.php';
	echo '<input id="callbackAlta" type="hidden" value="LISTAR ALUMNOS"></input>';
}

function alta() {
	require_once '../moduloalumnos/vistas/alta.php';
	echo '<input id="callbackAlta" type="hidden" value="ALTA ALUMNOS"></input>';
}

function recogeDatosAlta() {
	$alumno = new Alumno;
	$alumno -> login = $_POST['login'];
	$alumno -> password = $_POST['password'];
	$alumno -> password = crypt($alumno -> password, '@j@x');
	$alumno -> nombre = $_POST['nombre'];
	$alumno -> apellido = $_POST['apellido'];
	$alumno -> dni = $_POST['dni'];
	$alumno -> email = $_POST['email'];
	$alumno -> telefono = $_POST['telefono'];
	$alumno -> sexo = $_POST['sexo'];

	//print_r($_POST);
	altaAlumno($alumno);

	header("Location: ./index.php?controlador=alumnos&accion=listar");
}

function recogeDatosModifica() {
	$alumno = new Alumno;
	$alumno -> login = $_POST['login'];
	$alumno -> password = $_POST['password'];
	$alumno -> password = crypt($alumno -> password, '@j@x');
	$alumno -> nombre = $_POST['nombre'];
	$alumno -> apellido = $_POST['apellido'];
	$alumno -> dni = $_POST['dni'];
	$alumno -> email = $_POST['email'];
	$alumno -> telefono = $_POST['telefono'];
	$alumno -> sexo = $_POST['sexo'];

	modificaAlumno($alumno);
	header("Location: ./index.php?controlador=alumnos&accion=listar");
}

function buscar() {
	require '../moduloalumnos/vistas/buscar.php';
	echo '<input id="callbackAlta" type="hidden" value="BUSCAR ALUMNOS"></input>';
}

function eliminar() {
	require '../moduloalumnos/vistas/eliminar.php';
	echo '<input id="callbackAlta" type="hidden" value="ELIMINAR ALUMNOS"></input>';

}

function modificar() {
	require_once '../moduloalumnos/vistas/modificar.html';
	echo '<input id="callbackAlta" type="hidden" value="MODIFICAR ALUMNOS"></input>';
}
?>
