<?php  

	session_start();

	$arreglo = $_SESSION['carrito'];
	$numeroventa = 0;

	include '../conexion.php';
	$query = "SELECT * FROM compras ORDER BY numeroventa DESC LIMIT 1";
	$cmd = $db->query($query);
	
	while ($i = $cmd->fetch_assoc()) 
	{
		$numeroventa = $i['numeroventa'];		
	}

	if ($numeroventa == 0)
	{
		$numeroventa = 1;
	}
	else
	{
		$numeroventa++;
	}

	for ($i=0; $i < count($arreglo); $i++) { 
		$query = "INSERT INTO compras (numeroventa, nombre, imagen, precio, cantidad, subtotal) VALUES (
				" . $numeroventa . ",
				'" . $arreglo[$i]['Nombre'] . "',
				'" . $arreglo[$i]['Imagen'] . "',
				" . $arreglo[$i]['Precio'] . ",
				'" . $arreglo[$i]['Cantidad'] . "',
				'" . ($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']) . "'
				)";
		$cmd = $db->query($query);
	}
	unset($_SESSION['carrito']);
	header("Location: ../admin.php");

?>