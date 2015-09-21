<?php 

// Este archivo contendrá la información que se volcará como respuesta de AJAX en el div id="ventanachat"

$conexion 	= new SQLite3('../chat.db');
$results	= $conexion->query("SELECT * FROM mensajes ORDER BY utc ASC LIMIT 10;");

while($fila = $results->fetchArray()){
	echo $fila['utc'];
	echo ' - ';
	echo $fila['autor'];
	echo ' - ';
	echo $fila['mensaje'];
	echo '<br>';
}

$conexion->close();


 ?>