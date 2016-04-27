<?php 
require_once('librerias/conexion.php');

if (!isset($_POST['completado']))
	$_POST['completado'] = 0;

	$fecha = $_POST['fecha'];
	$actividad = $_POST['actividad'];
	$completado = $_POST['completado'];

	if ($_POST['nuevo'] == 0){
	$sql = "insert into actividades (fecha,actividad,completado) values ('".$fecha."','".$actividad."',".$completado.")";
	}
	else{
	$sql = "update actividades set fecha = '".$fecha."', actividad = '".$actividad."', completado = ".$completado;
	}

	$result = $conn->query($sql);
	if (!$result) die('Error en insercion de datos');
	header('Location: index.php');

 ?>