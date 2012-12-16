/**
 * @author Rubén Francés
 * @version 12-2012
 */



/**
 * @global contaErrores Variable global para utilizarla como contador
 */

var contaErrores = 0;

/**
 * @param campo Es el nombre del elemento 'section' correspondiente al 'input' que esta validando en ese momento donde se mostrará el error
 * @param texto Es el texto que recoge para mostrarlo en el navegador como error
 * @desc Funcion para crear un mensaje de error en el navegador cuando el 'input' no supere la validacion,
 * primero comprueba que no haya ya algun 'hijo' en el campo (ya haya mostrado el error anteriormente), si no hay error lo crea por DOM.
 */
function mostraError(campo, texto) {
	var element = document.getElementById(campo);
	var conta = element.childNodes.length;

	if (conta == 0) {
		var etiqueta = document.createElement("h6");
		var node = document.createTextNode(texto);
		etiqueta.appendChild(node);

		element.appendChild(etiqueta);
	}
}

/**
 * @param campo Es el nombre del elemento 'section' correspondiente al 'input' que esta validando en ese momento donde eliminará el error
 * @desc Funcion para eliminar el mensaje de error en el navegador cuando el 'input' YA supere la validacion,
 */
function suprimixError(campo) {

	var element = document.getElementById(campo);
	element.removeChild(element.firstChild);
	//alert("nia");

}

/**
 *
 * @param {Object} obj Recibe como parametro el objeto, en este caso el 'input' correspondiente al campo que se esta validando.
 * @desc Dependiendo de que 'input' estemos validando entrará en una condicion según el nombre del objeto,
 * cada campo a validar tiene su propia expresión regular que valida que esté correctamente escrito,
 * si no pasa la validación llama a la funcion 'mostraError' con los parametros correspondientes para que muestre el error en el navegador,
 * (también desactiva el boton 'Modificar' en el caso que estemos validando los campos en la pagina de modificación, ya que este validador
 * es usado tanto para dar de alta como para modificar coches)
 * en el caso que supere la validación, elimina el error que anteriormente habia mostrado en el navegador, y aumenta la variable
 * 'contaErrores' en uno.
 * @returns Devuelve true si no hay ningun error, en el momento que haya un error devuelve false.
 */
function valida_coche(obj) {
	erMatricula = /^[0-9]{4}[A-Z]{3}$/;
	erNombre = /^[a-zA-ZñÑáÁéÉíÍóÓúÚüÜ ]{3,20}$/;

	//valido la matricula
	if (obj.name == "matricula") {
		if (erMatricula.test(document.formulario.matricula.value) == false) {
			mostraError("divMatricula", "Matricula: 4 digitos y 3 letras MAYUSCULAS");
			document.getElementById("botoModifica").disabled = true;
			return false;
		} else {
			suprimixError("divMatricula");
			contaErrores++;
		}
	}

	//valido la marca
	if (obj.name == "marca") {
		if (erNombre.test(document.formulario.marca.value) == false) {
			mostraError("divMarca", "Marca: Min. 3 caracteres, Max. 20. Sin digitos");
			document.getElementById("botoModifica").disabled = true;

			return false;
		} else {
			suprimixError("divMarca");
			contaErrores++;

		}
	}

	//valido la marca
	if (obj.name == "modelo") {
		if (erNombre.test(document.formulario.modelo.value) == false) {
			mostraError("divModelo", "Modelo: Min. 3 caracteres, Max. 20. Sin digitos");
			document.getElementById("botoModifica").disabled = true;

			return false;
		} else {
			suprimixError("divModelo");
			contaErrores++;

		}
	}
	//valido el color
	if (obj.name == "color") {
		if (erNombre.test(document.formulario.color.value) == false) {
			mostraError("divColor", "Color: Min. 3 caracteres, Max. 20. Sin digitos");
			document.getElementById("botoModifica").disabled = true;

			return false;
		} else {
			suprimixError("divColor");
			contaErrores++;

		}
	}
	/*
	 * @global errores Variable global utilizada para comprobar si tiene hijos por DOM
	 * @global erroress Variable global utilizada como contador para contar cuantos hijos tiene la variable 'errores'	 *
	 */
	var errores = document.getElementById("divErrores");
	var erroress = 0;

	/**
	 * @desc Recorro el elemento 'errores' para comprobar si tiene hijos, si tiene, aumento en 1 el contador 'erroress'
	 */
	for (var i = 0; i < errores.childNodes.length; i++) {
		if (errores.childNodes[i].childNodes.length > 0) {
			erroress++;
		}
	}

	/**
	 * @desc Si 'erroress' es mayor que 0, (hay algun error), desactiva el 'botonModifica', en caso que no haya errores, activa el boton.
	 */
	if (erroress > 0) {
		document.getElementById("botoModifica").disabled = true;
	} else {
		document.getElementById("botoModifica").disabled = false;
	}

	return true;
}

/**
 * @desc Funcion creada para enviar el formulario, cuando todos los campos esten validados correctamente,
 * la variable 'tablaModifica' esta creada para comprobar si existe, si existe significa que estamos validando el formulario de modificacion de coches
 * si no existe, estamos validando el formulario de alta de coches.
 * Para enviar los datos al formualario de alta, tiene que ser el valor de 'contaErrores' igual a 4, ya que hay 4 campos a validar
 * y cada uno de ellos ha superado la validacion, en caso que no sea igual a 4, muestra un error para que se verifiquen los datos introducidos.
 * Si existe la 'tablaModifica' entonces el envio del formulario dependerá de si el botón de 'Modificar' esta activado o no.
 */
function enviar_coche() {
	var tablaAlta = document.getElementById("tablaModifica");
	if (tablaAlta == null) {
		if (contaErrores == 4) {
			document.formulario.submit();
		} else {
			alert("Revise los campos!");
		}
	} else {
		document.formulario.submit();
	}

}