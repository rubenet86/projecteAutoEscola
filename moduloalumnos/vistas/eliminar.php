<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US">
	<head>
		<style type="text/css" media="screen">
			.suggest_link {
				background-color: #FFFFFF;
				padding: 2px 6px 2px 6px;
			}
			.suggest_link_over {
				background-color: #3366CC;
				padding: 2px 6px 2px 6px;
			}
			#search_suggest {
				position: absolute;
				background-color: #FFFFFF;
				text-align: left;
				border: 1px solid #000000;
			}

		</style>
		<script language="javascript" src="../moduloalumnos/js/eliminar_alumnos.js" type="text/javascript"></script>
		<script language="javascript" src="../moduloalumnos/js/eliminar_alumnos1.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="tabla" style="width: 100px;" id="search_suggest4">
			<form id="frmSearch" action="#">
				<br/>
				Login alumno:
				<input type="text" id="txtSearch" name="txtSearch" alt="Search Criteria" onkeyup="searchSuggest();" autocomplete="off" />
				<br/>
				<div id="search_suggest"></div>
				<br/>
			</form>

			<TABLE>
				<TR>
					<div id="search_suggest1"></div>
					<br/>
					<div id="search_suggest3"></div>
					<br/>
					<div id="search_suggest2"></div>
					<br/>
				</TR>
			</TABLE>
		</div>
		<div style="width: 500px; height: 500px" id="search_suggest5"></div>
	</body>
</html>
