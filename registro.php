<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registro</title>

	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="librerias/bootsrap4/bootstrap.min.css">
	<link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
	<link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.css">

</head>
<body>

	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Tabs Titles -->
			<div class="fadeIn first">
				<h1>Registro</h1>
			</div>

			<!-- Login Form -->
			<form id="frmRegistro" method="post" onsubmit="return gregarUsuarioNuevo()" autocomplete="off">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" class="form-control" required>
				<label for="fecha">Fecha de nacimiento</label>
				<input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required readonly="">
				<label for="correo">Email o correo</label>
				<input type="email" name="email" id="correo" class="form-control" required>
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" class="form-control" required>
				<label for="contraseña">Contaseña</label>
				<input type="password" name="password" id="password" class="form-control" required>
				<div id="formFooter">
					<div class="row">
						<div class="col-sm-6 text-left">
							<button class="btn btn-primary">Registrar</button>
						</div>
						<div class="col-sm-6 text-right">
							<a href="index.php" class="btn btn-success">Login</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="librerias/jquery-3.5.1.min.js"></script>
	<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="librerias/sweetalert.min.js"></script>

	<script>

		$(function(){
			var fechaA = new Date();
			var yyyy = fechaA.getFullYear();

			$("#fechaNacimiento").datepicker({
				changeMonth:true,
				changeYear: true,
				yearRange:'1900:' + yyyy,
				dateFormat:"dd-mm-yy"
			});
		});


		function gregarUsuarioNuevo() {
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "procesos/usuario/registro/agregarUsuario.php",
				success: function(respuesta){
					respuesta = respuesta.trim(); 

					if (respuesta == 1) {
						$("#frmRegistro")[0].reset();
						swal(":D","Agregado con exito","success");
					}else if( respuesta == 2){
						swal("Este usuario ya existe, por favor escribe otro");
					}else{
						swal(":(","Fallo al agregar","Error");
					}
				}
			});
			return false;
		}
	</script>
</body>
</html>