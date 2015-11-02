<?php

	$db = new mysqli('localhost','root','','carritocompras');
	if(mysqli_connect_errno()){
		$msgerror = "No se ha logrado conectar a la base de datos. Reporte el problema al administrador.";
		echo $msgerror;
		exit(0);
	}
?>
