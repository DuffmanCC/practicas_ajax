<?php 




$usuarios = array('Carlos', 'Jorge', 'Javier', 'Francisco', 'Marcos', 'Juan Manuel');

if ( in_array($_GET['n'], $usuarios) ) {
	echo 'error';
} else {
	echo 'success';
}




?>