<?php 
session_start();
require_once "../../clases/Conexion.php";
$idUsuario = $_SESSION['idUsuario'];
$conexion = new Conectar();
$conexion = $conexion->conexion();

?>

<div class="table-responsive table-hover">
	<table class="table-primary" id="tablaCategoriasDataTable">
		<thead>
			<tr style="text-align: center;">
				<th>Nombre</th>
				<th>Fecha</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			$sql= "SELECT id_categoria, nombre, fechainsert 
					FROM t_categorias 
					WHERE id_usuario  = '$idUsuario'";
			$result = mysqli_query($conexion, $sql);
			while ($mostrar = mysqli_fetch_array($result)) {
				$idCategoria = $mostrar['id_categoria'];

				?>

				<tr style="text-align: center;">
					<td><?php echo $mostrar['nombre']; ?></td>
					<td><?php echo $mostrar['fechainsert']; ?></td>
					<td>
						<span class="btn btn-warning btn-sm">
							<span class="fas fa-edit"></span>
						</span>
					</td>
					<td>
						<span class="btn btn-danger btn-sm" 
								onclick="eliminarCategorias('<?php echo $idCategoria ?>')">
							<span class="fas fa-trash-alt"></span>
						</span>
					</td>
				</tr>

			<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {
		$('#tablaCategoriasDataTable').DataTable();
	} );
</script>