<?php
$servidor = '127.0.0.1';
$bd = 'autoescuela';
$usuario = 'root';
$contrasenia = 'nueva';

function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}
class ExcepcionEnTransaccion extends Exception{
	public function __construct(){}
}
?>
