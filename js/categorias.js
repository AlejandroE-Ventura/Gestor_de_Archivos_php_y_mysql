function agregarCategoria(){
	var categoria = $('#nombreCategoria').val();
	if (categoria == "") {
		swal("Debes agregar una categoria");
		return false;
	}else{
		$.ajax({
			type: "POST",
			data:"categoria=" + categoria,
			url:"../procesos/categorias/agregarCategoria.php",
			success:function(respuesta){
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#tablaCategorias').load("categorias/tablacategoria.php");
					$('#nombreCategoria').val("");
					swal(":D","Agregado con exito", "success");
				}else{
					swal(":(","Fallo al agregar!", "error");
				}
			}
		});
	}
}

function eliminarCategorias(idCategoria){
	idCategoria = parseInt(idCategoria);
	if (idCategoria < 1) {
		swal("Notienes id de categoria");
		return false;
	}else{
		//*****************************************************
		swal({
			title: "Estas seguro de eliminar esta categoria?",
			text: "Una vez eliminada, no podra recuperarse",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete)=>{
			if (willDelete) {
				$.ajax({
					type:"POST",
					data:"idCategoria=" + idCategoria,
					url: "../procesos/categorias/eliminarCategoria.php",
					success:function(respuesta){
						respuesta = respuesta.trim();
						if (respuesta == 1) {
							$('#tablaCategorias').load("categorias/tablacategoria.php");

							swal("Eliminado con exito",{
								icon: "success",
							});
						}else{
							swal(":(", "Fallo al eliminar", "error");
						}
						
					}
				});
			}
		});
		//******************************************************

	}
}