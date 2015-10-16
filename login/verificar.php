<?php 

	session_start();
	include '../conexion.php';

	$query = "SELECT * FROM usuarios WHERE Usuario = '" . $_POST['Usuario'] . "' AND Password = '". $_POST['Password'] ."'";
	$cmd = $db->query($query);
	echo $query;
	while ($i = $cmd->fetch_assoc())
	{
		$arreglo[] =  array('Nombre' => $i['Nombre'], 
							'Apellido' => $i['Apellido'],
							'Imagen' => $i['Imagen']);
	}

	if (isset($arreglo)) 
	{
		$_SESSION['Usuario'] = $arreglo;
		header("Location: ../admin.php");
	}
	else
	{
		header("Location: ../login.php?error=Datos no Validos");
	}

 ?>