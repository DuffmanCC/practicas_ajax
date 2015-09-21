<?php 

// Este archivo se encargará de coger el contenido del formulario de index.php y lo introducirá en la base de datos chat.db


$conexion 	= new SQLite3('../chat.db');

// inserto en la tabla mensajes la fecha en UTC, mi usuario y el mensaje que recibo del input con el name "mensajes" del index.php
$results	= $conexion->query(
							"INSERT INTO mensajes VALUES ('".date('g:i:s')."','Carlos','".$_GET['mensaje']."');"
						);

$conexion->close();


// cada 0 segundos se refrescará este archivo y me mandará ha index.php
echo "<meta http-equiv='REFRESH' content='0;url=index.php'>"







 ?> 