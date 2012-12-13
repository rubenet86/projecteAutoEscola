function getXmlHttpRequestObject() {
	if (window.XMLHttpRequest)
		return new XMLHttpRequest();
	else if (window.ActiveXObject)
		return new ActiveXObject("Microsoft.XMLHTTP");
	else
		alert("Your Browser Sucks!\nIt's about time to upgrade don't you think?");
}

var searchReq = getXmlHttpRequestObject();
function searchSuggest() {
	if (searchReq.readyState == 4 || searchReq.readyState == 0) {
		var txtSearch = escape(document.getElementById('txtSearch').value);
		searchReq.open("GET", '../modulocoches/modelos/eliminar_coches_ajax.php?txtSearch=' + txtSearch, true);
		searchReq.onreadystatechange = handleSearchSuggest;
		searchReq.send(null);
	}
}

function handleSearchSuggest() {
	if (searchReq.readyState == 4) {
		var ss = document.getElementById('search_suggest')
		ss.innerHTML = '';
		var str = searchReq.responseText.split("\n");
		for ( i = 0; i < str.length - 1; i++) {
			var suggest = '<div onmouseover="javascript:suggestOver(this);" ';
			suggest += 'onmouseout="javascript:suggestOut(this);" ';
			suggest += 'onclick="javascript:setSearch(this.innerHTML);" ';
			suggest += 'class="suggest_link">' + str[i] + '</div>';
			ss.innerHTML += suggest;
		}
	}
}

function suggestOver(div_value) {
	div_value.className = 'suggest_link_over';
}

function suggestOut(div_value) {
	div_value.className = 'suggest_link';
}

function setSearch(value) {
	document.getElementById('txtSearch').value = value;
	document.getElementById('search_suggest').innerHTML = '';
	//document.getElementById('search_suggest1').innerHTML = value;
	document.getElementById('search_suggest1').value = value;
	document.getElementById('search_suggest3').innerHTML = '<div> ' + '<input type="button" id="item_elimina" name="item_elimina" value="Elimina" onclick="elimina();"/>' + '</div>';
}
