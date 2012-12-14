/**
 * @author Rubén Francés
 * @version 12-2012
 */

/**
 * @desc Funcion para argar los eventos en la pagina 
 */
addEvent(window, 'load', inicializarEventos, false);
function inicializarEventos() {
	var ob = document.getElementById('login');
	addEvent(ob, 'keyup', presionTecla, false);
	var ob1 = document.getElementById('radio1');
	addEvent(ob1, 'click', presionTecla, false);
	var ob2 = document.getElementById('radio2');
	addEvent(ob2, 'click', presionTecla, false);
	var ob3 = document.getElementById('criterio_ord');
	addEvent(ob3, 'change', presionTecla, false);
}

/**
 * @global conexion1
 */
var conexion1;

/**
 * @desc Funcion para mediante AJAX, realizar una consulta a la BBDD cada vez que sea pulsada una tecla
 */
function presionTecla(e) {
	conexion1 = crearXMLHttpRequest();
	conexion1.onreadystatechange = procesarEventos;
	login = document.getElementById('login').value;
	conexion1.open('GET', '../moduloalumnos/modelos/buscar_alumnos_ajax.php?login=' + document.form1.login.value + "&radio1=" + document.form1.radio1.checked + "&radio2=" + document.form1.radio2.checked + "&criterio_ord=" + document.form1.criterio_ord.value, true);
	conexion1.send(null);
}

/**
 * @desc Funcion para mediante AJAX, procesar la consulta segun los eventos pulsados
 */
function procesarEventos() {
	var resultados = document.getElementById("resultados");
	if (conexion1.readyState == 4) {
		if (conexion1.status == 200)
			resultados.innerHTML = conexion1.responseText;
		else
			alert(conexion1.statusText);
	} else
		resultados.innerHTML = '';
}

//***************************************
//Funciones comunes a todos los problemas
//***************************************


/**
 * @desc Funcion para crear los eventos
 */
function addEvent(elemento, nomevento, funcion, captura) {
	if (elemento.attachEvent) {
		elemento.attachEvent('on' + nomevento, funcion);
		return true;
	} else if (elemento.addEventListener) {
		elemento.addEventListener(nomevento, funcion, captura);
		return true;
	} else
		return false;
}

/**
 * @desc Funcion para crear la petición AJAX
 */
function crearXMLHttpRequest() {
	var xmlHttp = null;
	if (window.ActiveXObject)
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	else if (window.XMLHttpRequest)
		xmlHttp = new XMLHttpRequest();
	return xmlHttp;
}