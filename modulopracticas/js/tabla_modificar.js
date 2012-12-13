var elemento = document.getElementById("buscar");
elemento.addEventListener('keyup',compruebaCantidad,false);

function compruebaCantidad(){
var tabla = document.getElementsByTagName("table")[0];

if(tabla.firstChild.childNodes.length===2){
	
	}
}
function modificaSelect(){
$cadena.='<td align="center"><select>';										
	if ($resultadoAlumnos->num_rows > 0){
		while ( $objA= $resultadoAlumnos->fetch_object()){
			LimpiaResultados($objA);
				//echo $objA->login;		
		$cadena.='<option value='.$objA->login.'>'.$objA->login.'</option>';
		}
	}							
$cadena.='</select></td>';
}