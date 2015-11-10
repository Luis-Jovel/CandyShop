<?php 
	session_start();	
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'/conexion.php'); 

	$TipoPaquete = isset($_POST['cmbPaquete']) ? $_POST['cmbPaquete'] : "";
	$CantidadTotal = 0;
	
	if ($TipoPaquete == "Infantil")
	{
		$Adultos = isset($_POST['adultos']) ? $_POST['adultos'] : "";
		$Ninias = isset($_POST['ninias']) ? $_POST['ninias'] : "";
		$Ninios = isset($_POST['ninios']) ? $_POST['ninios'] : "";
		$Pastel = isset($_POST['pastel']) ? $_POST['pastel'] : "";
		$Piniata = isset($_POST['piniata']) ? $_POST['piniata'] : "";
		$Animador = isset($_POST['animador']) ? $_POST['animador'] : "";

		$CantidadTotal = $Adultos + $Ninios + $Ninias;
		$CantidadTotal = RedondearTotal($CantidadTotal);
		
		if ($Pastel == 1)
			AgregarCarrito(11, 1, $db);
		if ($Piniata == 1)
			AgregarCarrito(6, 1, $db);
		if ($Animador == 1)
			AgregarCarrito(15, 1, $db);

		AgregarCarrito(13, $CantidadTotal, $db); //Cubiertos
		AgregarCarrito(16, $CantidadTotal, $db); //Platos
		AgregarCarrito(9, 2, $db); //Dulces
		AgregarCarrito(3, 2, $db); //Globos
		AgregarCarrito(8, 2, $db); //Globos

	}
	else if ($TipoPaquete == "Tradicional")
	{
		$Personas = isset($_POST['personas']) ? $_POST['personas'] : "";
		$Pastel = isset($_POST['pastel']) ? $_POST['pastel'] : "";
		$Piniata = isset($_POST['piniata']) ? $_POST['piniata'] : "";

		$CantidadTotal = $Personas;
		$CantidadTotal = RedondearTotal($CantidadTotal);
		
		if ($Pastel == 1)
			AgregarCarrito(10, 1, $db);
		if ($Piniata == 1)
			AgregarCarrito(14, 1, $db);
			
		AgregarCarrito(4, $CantidadTotal, $db); //Cubiertos
		AgregarCarrito(16, $CantidadTotal, $db); //Platos
		AgregarCarrito(1, 2, $db); //Dulces
		AgregarCarrito(3, 2, $db); //Globos
		AgregarCarrito(8, 2, $db); //Globos
	}

	header("Location: ../carritodecompras.php");

	function RedondearTotal($Cantidad)
	{
		$Cantidad = $Cantidad / 25;		
		return ceil($Cantidad);
	}

	function AgregarCarrito($Id, $Cantidad, $db)
	{
		if (isset($_SESSION['carrito']))
		{
			$arreglo = $_SESSION['carrito'];
			$encontro = false;
			$numero = 0;
			for ($i=0; $i < count($arreglo); $i++) { 
				if($arreglo[$i]['Id'] == $Id)
				{
					$encontro = true;
					$numero = $i;
				}
			}

			if($encontro == true)
			{
				$arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
				$_SESSION['carrito'] = $arreglo;
			}
			else
			{
				$nombre = "";
				$precio = 0;
				$imagen = "";

				$query = "SELECT * FROM productos WHERE id=" . $Id;
				$cmd = $db->query($query);
				
				while ($i = $cmd->fetch_assoc()) 
				{
					$nombre = $i['nombre'];
					$precio = $i['precio'];
					$imagen = $i['imagen'];
					$nombre_ingles = $i['nombre_EN'];
				}

				$datosNuevos=array('Id' => $Id,
								'Nombre' => $nombre,
								'Nombre_EN' => $nombre_ingles,
								'Precio' => $precio,
								'Imagen' => $imagen,
								'Cantidad' => $Cantidad);

				array_push($arreglo, $datosNuevos);
				$_SESSION['carrito'] = $arreglo;
			}
		}
		else
		{			
			$nombre = "";
			$precio = 0;
			$imagen = "";

			$query = "SELECT * FROM productos WHERE id=" . $Id;
			$cmd = $db->query($query);
			
			while ($i = $cmd->fetch_assoc()) 
			{
				$nombre = $i['nombre'];
				$precio = $i['precio'];
				$imagen = $i['imagen'];
				$nombre_ingles = $i['nombre_EN'];
			}	

			$arreglo[]=array('Id' => $Id,
							'Nombre' => $nombre,
							'Nombre_EN' => $nombre_ingles,
							'Precio' => $precio,
							'Imagen' => $imagen,
							'Cantidad' => $Cantidad);

			$_SESSION['carrito'] = $arreglo;			
		}
	}

?>