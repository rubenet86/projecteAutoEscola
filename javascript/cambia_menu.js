function cambia(txt){
	var etiqueta = document.createElement("h2");
	var titulo = document.getElementById("menuInfo");
	//var texto = document.getElementById("texto");
	//titulo.removeChild(texto);
	textoNuevo = document.createTextNode(txt);
	etiqueta.appendChild(textoNuevo);
	titulo.appendChild(etiqueta);
	//texto.innerHTML=txt;
	//titulo.appendChild(textoNuevo);
	//alert("va?");
//	return true;
}
