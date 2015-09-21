<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<link rel="stylesheet" href="style.css">

	<script>
		function ventanaChat(){

			var peticion_http;

			if(window.XMLHttpRequest) {  // Navegadores que siguen los estándares
			  peticion_http = new XMLHttpRequest();
			}
			else if(window.ActiveXObject) {  // Navegadores obsoletos
			  peticion_http = new ActiveXObject("Microsoft.peticion_http");
			}

			peticion_http.onreadystatechange = refresh;

			function refresh(){
				if(peticion_http.readyState==4 && peticion_http.status==200){
					// en el elemento con id ventanachat volcamos la respuesta de AJAX en formato texto
					document.getElementById("chat").innerHTML=peticion_http.responseText;
					setTimeout('ventanaChat()', 1000);
				}
			}

			peticion_http.open('GET', 'chat.php', true);
			peticion_http.send();
		}

		// a parte, cada vez que carguemos la página se cargará la función startRefresh que cargará la función ventanaChat cada segundo
		window.onload = function startRefresh(){
			setTimeout('ventanaChat()', 1000);
		}
	</script>
</head>
<body>
	<form action="insert.php" method="GET">
		<input type="text" name="mensaje" id="mensaje">
		<input type="submit">
	</form>

	<div id="chat">
		<script>
			ventanaChat();
		</script>
	</div>
</body>
</html>