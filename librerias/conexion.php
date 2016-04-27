<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$bdat = 'bd_tareas';

// Crear una instacia de msqli
$conn = new mysqli($host, $user, $pass, $bdat);

if ($conn->connect_errno > 0){
	die('Error de conexion [' . $conn->connect_error.']');
}
?>