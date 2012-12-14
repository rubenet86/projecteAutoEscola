/**
 * @author Rubén Francés
 * @version 12-2012
 */

/**
 * @global contaErrores Variable global para utilizarla como contador
 */

var contaErrores = 0;

/**
 * @param valor Es el caracter que coge del 'input' telefono
 * @desc Funcion creada para validar que el caracter introducido es un entero, realiza el parseo a integer.
 * @returns Devuelve el valor (el numero entero) en el caso que se pueda parsear, en caso contrario devuelve el string vacio
 */
function validarEntero(valor) {
	//intento convertir a entero.
	//si era un entero no le afecta, si no lo era lo intenta convertir
	valor = parseInt(valor);

	//Compruebo si es un valor numérico
	if (isNaN(valor)) {
		//entonces (no es numero) devuelvo el valor cadena vacia
		return ""
	} else {
		//En caso contrario (Si era un número) devuelvo el valor
		return valor
	}
}

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

}

/**
 *
 * @param {Object} obj Recibe como parametro el objeto, en este caso el 'input' correspondiente al campo que se esta validando.
 * @desc Dependiendo de que 'input' estemos validando entrará en una condicion según el nombre del objeto,
 * cada campo a validar tiene su propia expresión regular que valida que esté correctamente escrito,
 * si no pasa la validación llama a la funcion 'mostraError' con los parametros correspondientes para que muestre el error en el navegador,
 * (también desactiva el boton 'Modificar' en el caso que estemos validando los campos en la pagina de modificación, ya que este validador
 * es usado tanto para dar de alta como para modificar alumnos y profesores)
 * en el caso que supere la validación, elimina el error que anteriormente habia mostrado en el navegador, y aumenta la variable
 * 'contaErrores' en uno.
 * @returns Devuelve true si no hay ningun error, en el momento que haya un error devuelve false.
 */
function valida_envia(obj) {
	erDNI = /^[0-9]{8}[A-Z]$/;
	erNombre = /^[a-zA-ZñÑáÁéÉíÍóÓúÚüÜ ]{3,20}$/;

	//alert(obj.name);
	if (obj.name == "login") {
		//valido el login
		if (erNombre.test(document.formulario.login.value) == false) {
			mostraError("divLogin", "Login: Min. 3 caracteres, Max. 20. Sin digitos");
			return false;
		} else {
			suprimixError("divLogin");
			contaErrores++;
			//alert(contaErrores);
		}
	}
	if (obj.name == "password") {
		//valido el password
		if (erNombre.test(document.formulario.password.value) == false) {
			mostraError("divPassword", "Password: Min. 3 caracteres, Max. 20. Sin digitos");
			document.getElementById("botoModifica").disabled = true;
			return false;
		} else {
			suprimixError("divPassword");
			contaErrores++;

		}
	}
	if (obj.name == "nombre") {
		//valido el nombre
		if (erNombre.test(document.formulario.nombre.value) == false) {
			mostraError("divNombre", "Nombre: Min. 3 caracteres, Max. 20. Sin digitos");
			document.getElementById("botoModifica").disabled = true;
			return false;
		} else {
			suprimixError("divNombre");
			contaErrores++;

		}
	}
	if (obj.name == "apellido") {
		//valido el apellido
		if (erNombre.test(document.formulario.apellido.value) == false) {
			mostraError("divApellido", "Apellido: Min. 3 caracteres, Max. 20. Sin digitos");
			document.getElementById("botoModifica").disabled = true;
			errorForm = true;
			return false;
		} else {
			suprimixError("divApellido");
			contaErrores++;

		}
	}
	if (obj.name == "dni") {
		//valido el dni
		if (erDNI.test(document.formulario.dni.value) == false) {
			mostraError("divDNI", "DNI: 8 digitos y 1 letra mayuscula");
			document.getElementById("botoModifica").disabled = true;
			errorForm = true;
			return false;
		} else {
			//valido que sea un DNI valido
			dni = document.formulario.dni.value;
			numero = dni.substr(0, dni.length - 1);
			let = dni.substr(dni.length - 1, 1);
			numero = numero % 23;
			letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
			letra = letra.substring(numero, numero + 1);
			if (letra != let) {
				alert('Dni erroneo');
				return false;
			} else {
				suprimixError("divDNI");
				contaErrores++;

			}

		}
	}
	if (obj.name == "email") {
		if (document.formulario.email.value.length == 0) {
			mostraError("divEmail", "eMail: Tiene que escribir su email");
			document.formulario.email.focus();
			return false;
		} else {
			correo = document.formulario.email.value;
			if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(correo)) {
				mostraError("divEmail", "La direccion de email es incorrecta.");
				document.getElementById("botoModifica").disabled = true;
				errorForm = true;
				document.formulario.email.focus();
				return false;
			} else {
				suprimixError("divEmail");
				contaErrores++;

			}
		}
	}
	if (obj.name == "telefono") {
		//valido el telefono. tiene que ser entero y con 9 digitos
		telefono = document.formulario.telefono.value;
		telefono = validarEntero(telefono);
		document.formulario.telefono.value = telefono;
		if (telefono == "") {
			mostraError("divTelefono", "Tiene que introducir digitos en el telefono");
			document.formulario.telefono.focus();
			return false;
		} else {
			if (document.formulario.telefono.value.length != 9) {
				mostraError("divTelefono", "El numero tiene que tener 9 digitos");
				document.getElementById("botoModifica").disabled = true;
				errorForm = true;
				document.formulario.telefono.focus();
				return false;
			} else {
				suprimixError("divTelefono");
				contaErrores++;

			}
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
 * la variable 'tablaModifica' esta creada para comprobar si existe, si existe significa que estamos validando el formulario de modificacion de usuarios
 * si no existe, estamos validando el formulario de alta de usuarios.
 * Para enviar los datos al formualario de alta, tiene que ser el valor de 'contaErrores' igual a 7, ya que hay 7 campos a validar
 * y cada uno de ellos ha superado la validacion, en caso que no sea igual a 7, muestra un error para que se verifiquen los datos introducidos.
 * Si existe la 'tablaModifica' entonces el envio del formulario dependerá de si el botón de 'Modificar' esta activado o no.
 */
function enviar() {
	var tablaModifica = document.getElementById("tablaModifica");

	if (tablaModifica == null) {
		if (contaErrores == 7) {
			document.formulario.submit();
		} else {
			alert("Revise los campos!");
		}
	} else {
		document.formulario.submit();
	}

}

