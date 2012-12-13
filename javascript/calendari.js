					function dateChanged(calendar) {
						if (calendar.dateClicked) {
							var y = calendar.date.getFullYear();
							var m = calendar.date.getMonth();
							var d = calendar.date.getDate();
							window.location = "#";
							var fecha = y+"-"+m+"-"+d;
							//alert(fecha);
							document.formulario.fecha.value=fecha;
						}
					};
					
					Calendar.setup(
					{
					flat         : "calendar-container",
					flatCallback : dateChanged
					}
				);
				
