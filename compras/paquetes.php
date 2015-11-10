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
		
		if ($Pastel == 1)
		{
			AgregarCarrito(11, RedondearTotal($CantidadTotal, 20), $db); // Pastel
		}

		if ($Piniata == 1)
		{
			AgregarCarrito(6, 1, $db);  //Piñata
			AgregarCarrito(17, 1, $db); //Dulces
			AgregarCarrito(18, 1, $db); //Palo
			AgregarCarrito(19, 1, $db); //Lazo
		}

		if ($Animador == 1)
		{
			AgregarCarrito(15, 1, $db); // Animador
		}

		AgregarCarrito(13, RedondearTotal($CantidadTotal, 25), $db); //Cubiertos
		AgregarCarrito(16, RedondearTotal($CantidadTotal, 25), $db); //Platos
		AgregarCarrito(22, RedondearTotal($CantidadTotal, 25), $db); //Vasos
		AgregarCarrito(23, RedondearTotal($CantidadTotal, 10), $db); //Bebida
		AgregarCarrito(9, 2, $db); //Dulces
		AgregarCarrito(3, 2, $db); //Globos
		AgregarCarrito(8, 2, $db); //Guirnaldas
		AgregarCarrito(20, RedondearTotal($Ninios, 25), $db); //Bolsitas Niños
		AgregarCarrito(21, RedondearTotal($Ninias, 25), $db); //Bolsitas Niñas

	}
	else if ($TipoPaquete == "Tradicional")
	{
		$Personas = isset($_POST['personas']) ? $_POST['personas'] : "";
		$Pastel = isset($_POST['pastel']) ? $_POST['pastel'] : "";
		$Piniata = isset($_POST['piniata']) ? $_POST['piniata'] : "";

		$CantidadTotal = $Personas;
		$CantidadTotal = RedondearTotal($CantidadTotal);
		
		if ($Pastel == 1)
		{
			AgregarCarrito(10, RedondearTotal($CantidadTotal, 20), $db);
		}

		if ($Piniata == 1)
		{
			AgregarCarrito(14, 1, $db); //Piñata
			AgregarCarrito(17, 1, $db); //Dulces
			AgregarCarrito(18, 1, $db); //Palo
			AgregarCarrito(19, 1, $db); //Lazo
		}
			
		AgregarCarrito(4, RedondearTotal($CantidadTotal, 25), $db); //Cubiertos
		AgregarCarrito(16, RedondearTotal($CantidadTotal, 25), $db); //Platos
		AgregarCarrito(22, RedondearTotal($CantidadTotal, 25), $db); //Vasos
		AgregarCarrito(23, RedondearTotal($CantidadTotal, 10), $db); //Bebida
		AgregarCarrito(1, 2, $db); //Dulces
		AgregarCarrito(3, 2, $db); //Globos
		AgregarCarrito(8, 2, $db); //Guirnaldas
	}

	header("Location: ../carritodecompras.php");

	function RedondearTotal($Asistentes, $Cantidad)
	{
		$Asistentes = $Asistentes / $Cantidad;
		return ceil($Asistentes);
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