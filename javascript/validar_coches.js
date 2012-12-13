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


function valida_coche(obj){
	erMatricula=/^[0-9]{4}[A-Z]{3}$/;
 	erNombre=/^[a-zA-ZñÑáÁéÉíÍóÓúÚüÜ ]{3,20}$/;
    //valido la matricula
    if(obj.name=="matricula"){
    if (erMatricula.test(document.formulario.matricula.value)==false){
       mostraError("divMatricula","4 digitos y 3 letras MAYUSCULAS");
       document.getElementById("botoModifica").disabled=true;
       //document.formulario.matricula.focus();
       return false;
    }else{
    	suprimixError("divMatricula");
    	contaErrores++;	
    	//alert(contaErrores);
	}
	}
    
    //valido la marca
    if(obj.name=="marca"){
    if (erNombre.test(document.formulario.marca.value)==false){
       mostraError("divMarca","Min. 3 caracteres, Max. 20. Sin digitos");
       document.getElementById("botoModifica").disabled=true;
       //document.formulario.marca.focus();
       return false;
    }else{
    	suprimixError("divMarca");
    	contaErrores++;	
    	//alert(contaErrores);
	}
	}
	
	  //valido la marca
    if(obj.name=="modelo"){
    if (erNombre.test(document.formulario.modelo.value)==false){
       mostraError("divModelo","Min. 3 caracteres, Max. 20. Sin digitos");
       document.getElementById("botoModifica").disabled=true;
       //document.formulario.marca.focus();
       return false;
    }else{
    	suprimixError("divModelo");
    	contaErrores++;	
    	//alert(contaErrores);
	}
	}
    //valido el color
    if(obj.name=="color"){
    if (erNombre.test(document.formulario.color.value)==false){
       mostraError("divColor","Min. 3 caracteres, Max. 20. Sin digitos");
       document.getElementById("botoModifica").disabled=true;
       //document.formulario.color.focus();
       return false;
    }else{
    	suprimixError("divColor");
    	contaErrores++;	
    	//alert(contaErrores);
	}
	}

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
function enviar_coche(){
	var tablaAlta=document.getElementById("tablaModifica");
	//alert(tablaAlta);
	if(tablaAlta==null){
		if(contaErrores==3){
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