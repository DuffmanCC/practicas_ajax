<?php 


$conexion 	= new SQLite3('../eurobasket2015_espana.db');
$results	= $conexion->query('SELECT * FROM jugadores');

while($fila = $results->fetchArray()){
	if($fila["posicion"]==$_GET['j']){
		echo '<option value="'.$fila["jugador"].'">'.$fila["jugador"].'</option>';		
	}

}

$conexion->close();

echo $_GET['j'];
 ?>