function validarEntero(valor){ 
      //intento convertir a entero. 
     //si era un entero no le afecta, si no lo era lo intenta convertir 
     valor = parseInt(valor);

      //Compruebo si es un valor numérico 
      if (isNaN(valor)) { 
            //entonces (no es numero) devuelvo el valor cadena vacia 
            return "" 
      }else{ 
            //En caso contrario (Si era un número) devuelvo el valor 
            return valor 
      } 
} 
function valida_envia(){
	erDNI=/^[0-9]{8}[A-Z]$/;
 	erNombre=/^[a-zA-ZñÑáÁéÉíÍóÓúÚüÜ ]{4,20}$/;
    //valido el login
    if (erNombre.test(document.formulario.login.value)==false){
       alert("Tiene que escribir un login de minimo 4 caracteres!!");
       document.formulario.login.focus();
       return false;
    }
    //valido el password
    if (erNombre.test(document.formulario.password.value)==false){
       alert("Tiene que escribir un password de minimo 4 caracteres");
       document.formulario.password.focus();
       return false;
    }
    //valido el nombre
    if (document.formulario.nombre.value.length==0){
       alert("Tiene que escribir su nombre");
       document.formulario.nombre.focus();
       return false;
    }
    //valido el apellido
    if (document.formulario.apellido.value.length==0){
       alert("Tiene que escribir su apellido");
       document.formulario.apellido.focus();
       return false;
    }
    //valido el dni
    if (erDNI.test(document.formulario.dni.value)==false){
       alert("Tiene que escribir su dni correctamente");
       document.formulario.dni.focus();
       return false;
    }else{
    	dni =document.formulario.dni.value;
    	numero = dni.substr(0,dni.length-1);
		let = dni.substr(dni.length-1,1);
  		numero = numero % 23;
  		letra='TRWAGMYFPDXBNJZSQVHLCKET';
  		letra=letra.substring(numero,numero+1);
  		if (letra!=let) {
    	alert('Dni erroneo');
    	return false;
    	}
    	
    }
    
    if (document.formulario.email.value.length==0){
    	alert("Tiene que escribir su email");
    	document.formulario.email.focus();
        return false;
    }else{
	    correo = document.formulario.email.value;
	 	if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(correo)){
			alert("La direccion de email es incorrecta.");
			document.formulario.email.focus();
        	return false;
		} 
	}

    //valido el telefono. tiene que ser entero y con 9 digitos
    telefono = document.formulario.telefono.value;
    telefono = validarEntero(telefono);
    document.formulario.telefono.value=telefono;
    if (telefono==""){
       alert("Tiene que introducir digitos en el telefono");
       document.formulario.telefono.focus();
       return false;
    }else{
       if (document.formulario.telefono.value.length!=9){
          alert("El telefono debe tener 9 digitos");
          document.formulario.telefono.focus();
          return false;
       }
    }

    //valido el sexo
    if (document.formulario.sexo.selectedIndex==0){
       alert("Debe elegir sexo.");
       return false;
    }

    //el formulario se envia
    alert("Muchas gracias por registrarse");
    document.formulario.submit();
    
    return true;
} 
