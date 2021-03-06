<?php
require_once '../modelo/conexion.php';
require_once '../libreria.inc';
require_once '../modulocoches/modelos/cochesModelo.php';

function listar() {
	//Incluye el modelo que corresponde
	//require '../modulocoches/modelos/cochesModelo.php';

	//Le pide al modelo todos los items
	$coches = buscarTodosLosCoches();

	//Pasa a la vista toda la información que se desea representar
	require_once '../modulocoches/vistas/listar.php';
	echo '<input id="callbackAlta" type="hidden" value="LISTAR COCHES"></input>';
}

function alta() {
	require_once '../modulocoches/vistas/alta.php';
	echo '<input id="callbackAlta" type="hidden" value="ALTA COCHES"></input>';
}

function recogeDatosAlta() {
	$coche = new Coche;
	$coche -> matricula = $_POST['matricula'];
	$coche -> marca = $_POST['marca'];
	$coche -> modelo = $_POST['modelo'];
	$coche -> color = $_POST['color'];

	//print_r($_POST);
	altaCoche($coche);

	header("Location: ./index.php?controlador=coches&accion=listar");
}

function recogeDatosModifica() {
	$coche = new Coche;
	$coche -> matricula = $_POST['matricula'];
	$coche -> marca = $_POST['marca'];
	$coche -> modelo = $_POST['modelo'];
	$coche -> color = $_POST['color'];

	modificaCoche($coche);

	header("Location: ./index.php?controlador=coches&accion=listar");
}

function buscar() {
	require '../modulocoches/vistas/buscar.php';
	echo '<input id="callbackAlta" type="hidden" value="BUSCAR COCHES"></input>';
}

function eliminar() {
	require '../modulocoches/vistas/eliminar.php';
	echo '<input id="callbackAlta" type="hidden" value="ELIMINAR COCHES"></input>';

}

function modificar() {
	require_once '../modulocoches/vistas/modificar.php';
	echo '<input id="callbackAlta" type="hidden" value="MODIFICAR COCHES"></input>';
}
?>
