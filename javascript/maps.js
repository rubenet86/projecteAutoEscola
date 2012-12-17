function initialize() {
		if (GBrowserIsCompatible()) {
			var map = new GMap2(document.getElementById("map_canvas"));
			map.setCenter(new GLatLng(38.825300912779646, -0.6138959999999543), 17);
			map.setUIToDefault();
			map.setMapType(G_SATELLITE_MAP);
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
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			
		
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