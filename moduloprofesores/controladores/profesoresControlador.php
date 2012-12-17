<?php
require_once '../modelo/conexion.php';
require_once '../libreria.inc';
require_once '../moduloprofesores/modelos/profesoresModelo.php';

function listar() {
	//Incluye el modelo que corresponde
	//require '../moduloalumnos/modelos/alumnosModelo.php';

	//Le pide al modelo todos los items
	$profesores = buscarTodosLosProfesores();

	//Pasa a la vista toda la información que se desea representar
	require_once '../moduloprofesores/vistas/listar.php';
	echo '<input id="callbackAlta" type="hidden" value="LISTAR PROFESORES"></input>';
}

function alta() {
	require_once '../moduloprofesores/vistas/alta.php';
	echo '<input id="callbackAlta" type="hidden" value="ALTA PROFESORES"></input>';
}

function recogeDatosAlta() {
	$profesor = new Profesor;
	$profesor -> login = $_POST['login'];
	$profesor -> password = $_POST['password'];
	$profesor -> password = crypt($profesor -> password, '@j@x');
	$profesor -> nombre = $_POST['nombre'];
	$profesor -> apellido = $_POST['apellido'];
	$profesor -> dni = $_POST['dni'];
	$profesor -> email = $_POST['email'];
	$profesor -> telefono = $_POST['telefono'];
	$profesor -> sexo = $_POST['sexo'];
	//alert("va?");
	print_r($_POST);
	altaProfesor($profesor);

	header("Location: ../index.php?controlador=profesores&accion=listar");
}

function recogeDatosModifica() {
	$profesor = new Profesor;
	$profesor -> login = $_POST['login'];
	$profesor -> password = $_POST['password'];
	$profesor -> password = crypt($profesor -> password, '@j@x');
	$profesor -> nombre = $_POST['nombre'];
	$profesor -> apellido = $_POST['apellido'];
	$profesor -> dni = $_POST['dni'];
	$profesor -> email = $_POST['email'];
	$profesor -> telefono = $_POST['telefono'];
	$profesor -> sexo = $_POST['sexo'];

	modificaProfesor($profesor);

	header("Location: ./index.php?controlador=profesores&accion=listar");
}

function buscar() {
	require '../moduloprofesores/vistas/buscar.php';
	echo '<input id="callbackAlta" type="hidden" value="BUSCAR PROFESORES"></input>';
}

function eliminar() {
	require '../moduloprofesores/vistas/eliminar.php';
	echo '<input id="callbackAlta" type="hidden" value="ELIMINAR PROFESORES"></input>';

}

function modificar() {
	require_once '../moduloprofesores/vistas/modificar.php';
	echo '<input id="callbackAlta" type="hidden" value="MODIFICAR PROFESORES"></input>';
}
?>
