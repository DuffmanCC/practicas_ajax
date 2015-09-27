<?php 


$db 	= new SQLite3('../usuarios.db');
$results	= $db->query('SELECT nombre FROM usuarios');

while($row = $results->fetchArray()){
	echo $row['nombre']."<br>";
}

$db->close();

?>