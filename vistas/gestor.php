<?php 
	session_start();
	if (isset($_SESSION['usuario'])) {

		include 'header.php';
 ?>



<?php include 'footer.php'; ?>

<?php 
}else{
	header('location:../index.php');
}

 ?>