<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap css CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <!-- Google Fonts CDN -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Indie+Flower" type="text/css"  />

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) CDN -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- jQueryUI CDN -->
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <!-- Bootstrap CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Modernizr CDN -->
    <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.7.2.js"></script>

    <link rel="stylesheet" href="style.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script>
		function sugerencias(str){
			var peticion_http;

			if(window.XMLHttpRequest) {  // Navegadores que siguen los estándares
			  peticion_http = new XMLHttpRequest();
			}
			else if(window.ActiveXObject) {  // Navegadores obsoletos
			  peticion_http = new ActiveXObject("Microsoft.peticion_http");
			}

			// cuando cambie el readyState se ejecutará la función validacion
			peticion_http.onreadystatechange = validacion;

			// en la variable 'n' meto lo que he escrito en el input 'srt'
			peticion_http.open("GET", "validar.php?n="+str, true);
			peticion_http.send();

			function validacion(){
				if(peticion_http.readyState==4 && peticion_http.status==200){

          var usuario = document.getElementById('usuario'); // seleccionamos el elemento con #usuario;
          var clase = document.createAttribute('class'); // creamos el atributo class
          clase.value = peticion_http.responseText; // le asignamos al atributo class el valor de la respuesta de la petición de AJAX
          usuario.setAttributeNode(clase); // a #usuario le asigno la variable clase

				}				
			}

			
		}

		
	</script>

  </head>
  <body>

    <div class="container">
      <div class="row">
        <h1>Validación de usuarios de una base de datos mediante AJAX</h1>
        <p>Validaremos usuarios que se encontrarán en una base de datos SQLite3 para ver si los nombres se encuentran ya en uso, de esta forma si el usuario ya existe el form se pondrá en rojo y si está disponible se pondrá en verde.</p>	
        <p>Todo esto se realizará mediante AJAX sin necesidad de recargar en ningún momento el navegador.</p>
        <div class="col-sm-6">
          <form action="validar.php">
            <h2>Comprobación usuarios</h2> 
            <div class="form-group">
              <label class="control-label" for="usuario">Nombre de usuario:</label>
              <input class="" type="text" name="usuario" id="usuario" onkeyup="sugerencias(this.value)" placeholder="usuario">
            </div>    
          </form>
          <div id="respuesta_ajax"></div>          
        </div>

        <div class="col-sm-6">
          <h2>Estos son los usuarios que no se pueden repetir.</h2>
          <?php include('lista_usuarios.php') ?>
        </div>

      </div>
    </div>	
    
  </body>
</html>

