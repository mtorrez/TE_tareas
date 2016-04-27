<?php 
include_once('librerias/conexion.php');
include_once('librerias/cabecera.php');

if (!isset($_GET['id'])){
	$id = 0;
	$fecha = date('Y-m-d');
	$actividad =  "";
	$completado = "0";
}
else{
	$sql = "select * from actividades where id = " . $_GET['id'];
	$result = $conn->query($sql);
	$fila = $result->fetch_array();

	$id = $fila['id'];

	$fechatempo = $fila['fecha'];
	$fecha = date("Y-m-d",strtotime($fechatempo));

	var_dump($fecha);
	
	$actividad = $fila['actividad'];
	$completado = $fila['completado'];
}
?>
<h3>Registro de actividad</h3>

<form action="procesar.php" method="post">
	<label for="fecha">Fecha: </label><input type="date" name="fecha" value="<?php echo $fecha; ?>" >
	<label for="actividad">Actividad: </label><input type="text" name="actividad" value="<?php echo $actividad; ?>" >
	<label for="completado">Completado: </label><input type="checkbox" name="completado" value="1" <?php echo ($completado == 1) ? 'checked':''; ?>>
	<input type="hidden" name="nuevo" value="<?php echo $id; ?>">
	<input type="submit">
</form>

<?php
include_once('librerias/pie.php');
?>