var contaErrores = 0;
//document.getElementsByClassName("claseMenu");
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
//var conta=0;
function mostraError(campo,texto){
	var element=document.getElementById(campo);
	
	var conta =element.childNodes.length;
	//alert(conta);
	//alert(campo);
	//alert(texto);
	if(conta==0){
		var etiqueta=document.createElement("h6");
		var node=document.createTextNode(texto);
		etiqueta.appendChild(node);
		
		element.appendChild(etiqueta);
	}
}
function suprimixError(campo){
	
	var element=document.getElementById(campo);
	
	element.removeChild(element.firstChild);
	
	//alert("nia");	
	
		
}


function valida_envia(obj){
	erDNI=/^[0-9]{8}[A-Z]$/;
 	erNombre=/^[a-zA-ZñÑáÁéÉíÍóÓúÚüÜ ]{3,20}$/;
    
    //alert(obj.name);
    if(obj.name=="login"){
    //valido el login
   if (erNombre.test(document.formulario.login.value)==false){
       mostraError("divLogin","Login: Min. 3 caracteres, Max. 20. Sin digitos");
       return false;
    }else{
    	suprimixError("divLogin");
    	contaErrores++;	
    	//alert(contaErrores);
	}
	}
    if(obj.name=="password"){
    //valido el password
    if (erNombre.test(document.formulario.password.value)==false){
       	mostraError("divPassword","Password: Min. 3 caracteres, Max. 20. Sin digitos");
       	return false;
    }else{
    	suprimixError("divPassword");
    	contaErrores++;
    	
    		
	}
	}
	if(obj.name=="nombre"){
    //valido el nombre
    if (erNombre.test(document.formulario.nombre.value)==false){
       mostraError("divNombre","Nombre: Min. 3 caracteres, Max. 20. Sin digitos");
    	document.getElementById("botoModifica").disabled=true;
       return false;
    }else{
    	suprimixError("divNombre");
    	contaErrores++;	
    	
	}
	}
	if(obj.name=="apellido"){
    //valido el apellido
    if (erNombre.test(document.formulario.apellido.value)==false){
       mostraError("divApellido","Apellido: Min. 3 caracteres, Max. 20. Sin digitos");
     	document.getElementById("botoModifica").disabled=true;
       errorForm=true;
       return false;
    }else{
    	suprimixError("divApellido");
    	contaErrores++;	
    
	}
	}
	if(obj.name=="dni"){
    //valido el dni
    if (erDNI.test(document.formulario.dni.value)==false){
       mostraError("divDNI","DNI: 8 digitos y 1 letra mayuscula");
       document.getElementById("botoModifica").disabled=true;
       errorForm=true;
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
    	}else{
    		suprimixError("divDNI");
    		contaErrores++;	
    		
		}
    	
    }
    }
    if(obj.name=="email"){
    if (document.formulario.email.value.length==0){
    	mostraError("divEmail","eMail: Tiene que escribir su email");
    	document.formulario.email.focus();
        return false;
    }else{
	    correo = document.formulario.email.value;
	 	if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(correo)){
			mostraError("divEmail","La direccion de email es incorrecta.");
			document.getElementById("botoModifica").disabled=true;
			errorForm=true;
			document.formulario.email.focus();
        	return false;
		} else{
    		suprimixError("divEmail");
    		contaErrores++;	
    		
		}	
	}
	}
	if(obj.name=="telefono"){
    //valido el telefono. tiene que ser entero y con 9 digitos
    telefono = document.formulario.telefono.value;
    telefono = validarEntero(telefono);
    document.formulario.telefono.value=telefono;
    if (telefono==""){
    	mostraError("divTelefono","Tiene que introducir digitos en el telefono");
        document.formulario.telefono.focus();
       return false;
    }else{
       if (document.formulario.telefono.value.length!=9){
          mostraError("divTelefono","El numero tiene que tener 9 digitos");
          document.getElementById("botoModifica").disabled=true;
          errorForm=true;
          document.formulario.telefono.focus();
          return false;
       }else{
       		suprimixError("divTelefono");
       		contaErrores++;
       		
       }
    }
	}
   //el formulario se envia 
    //alert("Muchas gracias por registrarse");
 //   
 	var errores = document.getElementById("divErrores");
	var erroress=0;
	for (var i=0; i < errores.childNodes.length; i++) {
		if(errores.childNodes[i].childNodes.length>0){
			erroress++;
		}
	}		
	if(erroress>0){
	  		document.getElementById("botoModifica").disabled=true;
	  }else{
	  	document.getElementById("botoModifica").disabled=false;
	  	
	  }
	
	return true;
} 
function enviar(){
	var tablaAlta=document.getElementById("tablaModifica");
	//alert(tablaAlta);
	if(tablaAlta==null){
		if(contaErrores==7){
		document.formulario.submit();
		}
		else{
			//alert(contaErrores);
			alert("Revise los campos!");
		}
	}else {
		document.formulario.submit();
	}
			
}

