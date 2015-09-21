<?php 


$conexion 	= new SQLite3('../eurobasket2015_espana.db');
$results	= $conexion->query('SELECT * FROM posiciones');

while($fila = $results->fetchArray()){
	echo '<option value="'.$fila["posicion"].'">'.$fila["posicion"].'</option>';
}

$conexion->close();




 ?>