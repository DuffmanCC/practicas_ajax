<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Selector múltiple</title>
	<link rel="stylesheet" href="style.css">

	<script>
		function showselect(str){
			var peticion_http;

			if(window.XMLHttpRequest) {  // Navegadores que siguen los estándares
			  peticion_http = new XMLHttpRequest();
			}
			else if(window.ActiveXObject) {  // Navegadores obsoletos
			  peticion_http = new ActiveXObject("Microsoft.peticion_http");
			}

			
			peticion_http.onreadystatechange = eurobasket;

			function eurobasket(){
				if(peticion_http.readyState==4 && peticion_http.status==200){
					// en el elemento con id jugadores volcamos la respuesta
					document.getElementById('jugadores').innerHTML=peticion_http.responseText;
				}
			}

			// en la variable j meto la selección del primer select
			peticion_http.open("GET", "jugadores.php?j="+str, true);
			peticion_http.send();

		}
	</script>
</head>
<body>

	<h1>Selector múltiple mediante AJAX</h1>
	<p>Sin recargar la página y haciéndo peticiones al servidor con AJAX conseguimos que el segundo SELECT se autoseleccione en función de lo que seleccionemos en el primero.</p>
	<form action="">
		<h3>Elegir posición:</h3>
		<!-- este select se nutrirá de la base de datos populartipos.db -->
		<select name="posiciones" id="posiciones" onchange="showselect(this.value)">
			<!-- muestra los resultados de la columna posicion de la tabla posiciones de la base de datos eurobasket2015_espana.db -->
			<?php include "posiciones.php" ?>
		</select>
	</form>


	<!-- aquí va la información recuperada por AJAX -->
	<div id="repuestaAjax">
		<h3>Jugadores disponibles:</h3>
		<select name="jugadores" id="jugadores">
			<!-- dentro de este select se recupera la respuesta de AJAX en formato texto -->
		</select>
	</div>
</body>
</html>