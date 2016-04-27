<?php 	
require_once('librerias/conexion.php');
require_once('librerias/cabecera.php');

$sql = 'select * from actividades';
$result = $conn->query($sql);

?>

	<h1>Gestor de tareas</h1>
	<div id="buscar">
		<label for="buscar">Buscar:</label><input type="text" name="cadena"> <input type="submit" value="Buscar">
	</div>
	<a href="editar.php">Nuevo</a><br>

	<?php if (($result->num_rows > 0)) {?>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Fecha</th>
			<th>Actividad</th>
			<th>Completado</th>
			<th></th>
			<th></th>
		</tr>
		<?php 
			$conta = 0;
			while ($fila = $result->fetch_array()){
				echo "<tr>";
				echo '<td>' . ++$conta . '</td>';	
				echo '<td>' . $fila['fecha'] . '</td>';
				echo '<td>' . $fila['actividad'] . '</td>';
				echo '<td>' . $fila['completado'] . '</td>';
				echo '<td><a href="editar.php?id='. $fila['id'] . '">Modificar</a></td>'; 
				echo '<td><a href="eliminar.php?id='. $fila['id'] . '" onclick="return confirm(\'Esta seguro\')">Eliminar</a></td>';
				echo "</tr>";
			}
				
		?>
	</table>
	<?php 
	}
		else{
		echo '<p> No existen registros</p>';
	}
 ?>
<?php require_once('librerias/pie.php'); ?>
