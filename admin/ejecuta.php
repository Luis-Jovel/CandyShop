<?php 
	include "../conexion.php";
	if($_POST['Caso']=="Eliminar"){		
		$query = "DELETE FROM productos WHERE id=".$_POST['Id'];
		$cmd = $db->query($query);
		unlink("../productos/".$_POST['Imagen']);
		echo 'El producto se ha eliminado';
	}

	if($_POST['Caso']=="Modificar"){
		$query = "update productos set Nombre='".$_POST['Nombre']."',Descripcion='".$_POST['Descripcion']."',Precio='".$_POST['Precio']."' where Id=".$_POST['Id'];
		$cmd = $db->query($query);
		echo 'El producto se ha modificado';
	}

?>