function getXmlHttpRequestObject() {
	if (window.XMLHttpRequest) 
		return new XMLHttpRequest();
	else if(window.ActiveXObject) 
		return new ActiveXObject("Microsoft.XMLHTTP");
	else 
		alert("Your Browser Sucks!\nIt's about time to upgrade don't you think?");
}
var searchReq = getXmlHttpRequestObject();
function elimina() {
	if (searchReq.readyState == 4 || searchReq.readyState == 0) {
		var txtSearch = escape(document.getElementById('search_suggest1').value);
		searchReq.open("GET", '../modulopracticas/modelos/eliminar_practicas_ajax1.php?txtSearch=' + txtSearch, true);
		searchReq.onreadystatechange = handleSearchSuggest1; 
		searchReq.send(null);
		alert("La practica numero: "+txtSearch+" a sido eliminada!");
		document.getElementById('txtSearch').value="";
	}
	//window.location.href="../moduloalumnos/vistas/listar.php";
		
}
function handleSearchSuggest1() {
	if (searchReq.readyState == 4) {
		document.getElementById('search_suggest1').innerHTML = '';
		document.getElementById('search_suggest3').innerHTML = '';
		document.getElementById('search_suggest2').innerHTML = '';
		document.getElementById('search_suggest4').innerHTML = '';
		var ss = document.getElementById('search_suggest5')
		ss.innerHTML = '';
		var str = searchReq.responseText;
		ss.innerHTML = str;
	}
}