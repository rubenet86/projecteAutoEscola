window.onload=function(){
	var menu = document.getElementById("texto");
	var textoNuevo = document.createTextNode("MENU PRINCIPAL");
	menu.appendChild(textoNuevo);
	
		var callback = document.getElementById("callbackAlta");
	
	if(callback!=null){
		
		var valor = callback.value;
		callback.parentNode.removeChild(callback);
		cambia(valor);
	}	
	
	function dateChanged(calendar) {
		if (calendar.dateClicked) {
			var y = calendar.date.getFullYear();
			var m = calendar.date.getMonth();
			var d = calendar.date.getDate();
			window.location = "#";
			var fecha = y + "-" + m + "-" + d;
			document.formulario.fecha.value = fecha;
		}
	};

	Calendar.setup({
		flat : "calendar-container",
		flatCallback : dateChanged
	});
	
	animacio();
}

function cambia(txt){
	var etiqueta = document.createElement("h2");
	var titulo = document.getElementById("menuInfo");
	var texto = document.getElementById("texto");
	titulo.removeChild(texto);
	textoNuevo = document.createTextNode(txt);
	etiqueta.appendChild(textoNuevo);
	titulo.appendChild(etiqueta);
	
}

function animacio(){
	$('#tablaAlta').effect("slide","slow");
	$('#logo').effect("slide","slow");
	
}
