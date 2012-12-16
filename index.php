<html>
	<head>
		<title> Autoescuela Cuela </title>
		<link href="estilo.css" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
		<script src="https://maps.google.com/maps?file=api&v=2&key=AIzaSyBhqZULIJ8jYl52NbhGZsUpBQWWYwEW8Dg&sensor=true_or_false"
<<<<<<< HEAD
        type="text/javascript"></script>
        	<script type="text/javascript" src="javascript/textArea.js"></script>
		<script type="text/javascript" src="javascript/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

  <script type="text/javascript">
	function initialize() {
		if (GBrowserIsCompatible()) {
			var map = new GMap2(document.getElementById("map_canvas"));
			map.setCenter(new GLatLng(38.825300912779646, -0.6138959999999543), 17);
			map.setUIToDefault();
			map.openInfoWindow(map.getCenter(), document.createTextNode("Autoescuela Cuela, esta aqui"));

		}
		var point = new GLatLng(38.825300912779646, -0.6138959999999543);
		map.addOverlay(new GMarker(point));


tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
})
	}

    </script>
	</head>
	<body onload="initialize()" onunload="GUnload()">
=======
        type="text/javascript">
</script>

  <script type="text/javascript">

    function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(38.825300912779646, -0.6138959999999543), 16);
        map.setUIToDefault();
      }
     // Add 10 markers to the map at random locations
  var bounds = map.getBounds();
  var southWest = bounds.getSouthWest();
  var northEast = bounds.getNorthEast();
  var lngSpan = northEast.lng() - southWest.lng();
  var latSpan = northEast.lat() - southWest.lat();
  for (var i = 0; i < 10; i++) {
    var point = new GLatLng(southWest.lat() + latSpan * Math.random(),
        southWest.lng() + lngSpan * Math.random());
    map.addOverlay(new GMarker(point));
  }

    }

    </script>
	</head>
	<body   onload="initialize()" onunload="GUnload()">
>>>>>>> f5c6d7d9e8b6f8dc603d757bf664e15da87daee2

		<div id="cabecera">
			<p>
				Autoescuela Cuela
			</p>
		</div>
		<?php 
function CompruebaErrorMySQL($mensaje, $conexion){
	if (mysqli_errno($conexion) != 0){
		echo $mensaje.' :'.mysqli_error($conexion);
		mysqli_close($conexion);
		exit();
	}
}
function CompruebaErrorConexionMySQL($mensaje){
	if (mysqli_connect_errno() != 0){
		echo $mensaje.' :'.mysqli_connect_error();
		exit();
	}
}

	if (isset($_POST['login'])===false){
?>
		<div id="tablaIndex">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<TABLE>
					<TR>
						<TD>Login:</TD>
						<TD>
						<INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="30">
						</TD>
					</TR>
					<TR>
						<TD>Password:</TD>
						<TD>
						<INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="30">
						</TD>
					</TR>
				</TABLE>
				<INPUT TYPE="submit" NAME="accede" VALUE="Accede">
			</FORM>

			<?php
			}else{
			$login=$_POST['login'];
			$password=$_POST['password'];
			$password=crypt($password,'@j@x');

			try{
			@ $db = mysqli_connect('127.0.0.1', 'root', 'nueva');

			CompruebaErrorConexionMySQL('Error conectando con la bd');

			mysqli_select_db($db, 'autoescuela');
			CompruebaErrorMySQL('Error seleccionando la BD', $db);

			$resultadoAlumnos = mysqli_query($db, "select * from alumnos where login='".$login."' and password='".$password."'");

			$resultadoProfesores = mysqli_query($db, "select * from profesores where login='".$login."' and password='".$password."'");
			CompruebaErrorMySQL('Error realizando la consulta', $db);

			if (mysqli_num_rows($resultadoAlumnos) > 0 || mysqli_num_rows($resultadoProfesores) > 0){

			header("Location: ./vistas/principal.html");

			}else{

			echo "<div id='tabla'>";
<<<<<<< HEAD
=======

			
>>>>>>> f5c6d7d9e8b6f8dc603d757bf664e15da87daee2
			?>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<TABLE>
					<TR>
						<TD>Login:</TD>
						<TD>
						<INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="30" value="<?php echo $_POST['login'] ?>">
						</TD>
					</TR>
					<TR>
						<TD>Password:</TD>
						<TD>
						<INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="30">
						</TD>
					</TR>
				</TABLE>
				<INPUT TYPE="submit" NAME="accede" VALUE="Accede">
			</FORM>
			<p>
				[Login o password erroneos]
			</p>
			</div>
			<?php
			mysqli_free_result($resultadoAlumnos);
			mysqli_free_result($resultadoProfesores);
			mysqli_close($db);
			}
			}catch (Exception $e){
			echo $e->getMessage();
			if (mysqli_connect_errno() == 0)
			$db->close();
			exit();
			}

			}
			?></div>
			<div id="pie">
				<p>
					Powered by Ruben Frances
				</p>
			</div>
			<div id="extras">
	<div id="map_canvas" style="width: 500px; height: 300px"></div> 
<<<<<<< HEAD
	<textarea id="textee" name="content"></textarea>
=======
	<textarea id=textee" name="content"></textarea>
>>>>>>> f5c6d7d9e8b6f8dc603d757bf664e15da87daee2
	</div>
	</body>
</html>