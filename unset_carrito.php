<?php 
	include('variables.php');
	session_start();
	unset($_SESSION['carrito']);
	echo '<script>window.location.href="' . $base_url. '/carritodecompras.php";</script>';
?>