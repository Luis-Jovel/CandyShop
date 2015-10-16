<?php
	session_start();
	include 'conexion.php';

	if ((isset($_SESSION['carrito'])) && (isset($_GET['id'])))
	{
		$arreglo = $_SESSION['carrito'];
		$encontro = false;
		$numero = 0;
		for ($i=0; $i < count($arreglo); $i++) { 
			if($arreglo[$i]['Id'] == $_GET['id'])
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

			$query = "SELECT * FROM productos WHERE id=" . $_GET['id'];
			$cmd = $db->query($query);
			
			while ($i = $cmd->fetch_assoc()) 
			{
				$nombre = $i['nombre'];
				$precio = $i['precio'];
				$imagen = $i['imagen'];
			}

			$datosNuevos=array('Id' => $_GET['id'],
							'Nombre' => $nombre,
							'Precio' => $precio,
							'Imagen' => $imagen,
							'Cantidad' => 1);

			array_push($arreglo, $datosNuevos);
			$_SESSION['carrito'] = $arreglo;
		}
	}
	else
	{
		if (isset($_GET['id']))
		{
			$nombre = "";
			$precio = 0;
			$imagen = "";

			$query = "SELECT * FROM productos WHERE id=" . $_GET['id'];
			$cmd = $db->query($query);
			
			while ($i = $cmd->fetch_assoc()) 
			{
				$nombre = $i['nombre'];
				$precio = $i['precio'];
				$imagen = $i['imagen'];
			}

			$arreglo[]=array('Id' => $_GET['id'],
							'Nombre' => $nombre,
							'Precio' => $precio,
							'Imagen' => $imagen,
							'Cantidad' => 1);

			$_SESSION['carrito'] = $arreglo;
		}
	}
?>

<!-- <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  src="./js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>	
</head>
<body>
	<header>
		<div class="titulo">Carrito de Compras
			<a href="./carritodecompras.php" title="ver carrito de compras">
				<img src="./imagenes/carrito.png">
			</a>
		</div>
	</header> -->
<?php include "include/header.php" ?>
<script src="<?=$base_url?>/js/scripts.js"></script>
	<section class="container">
		<?php
		$total = 0;
		if (isset($_SESSION['carrito']))
		{
			$datos = $_SESSION['carrito'];
			$total = 0;
			for ($i=0; $i < count($datos); $i++) 
			{ 
		?>
				<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 producto-container">
					<div class="producto">
						<center>
							<img src="./productos/<?php echo $datos[$i]	['Imagen'];?>"><br>
							<span><?php echo $datos[$i]['Nombre']; ?></span><br>
							<span>Precio: $<?php echo $datos[$i]['Precio']; ?></span><br>
							<span>Cantidad: 
								<input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
								data-precio="<?php echo $datos[$i]['Precio']; ?>"
								data-id="<?php echo $datos[$i]['Id']; ?>"
								class="cantidad">
							</span><br>
							<span class="subtotal">SubTotal: $<?php echo $datos[$i]['Precio'] * $datos[$i]['Cantidad']; ?></span><br>
							<a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id'] ?>">Eliminar</a>
						</center>
					</div>
				</div>
		<?php	
				$total = ($datos[$i]['Precio'] * $datos[$i]['Cantidad']) + $total;
			}
		}
		else 
		{
			echo "<center><h2>El carrito de compras esta vacio.</h2></center>";
		}

		echo '<center><h2 id="total">Total: $' . $total . '</h2></center>';

		if ($total != 0) {		
			//echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>';

		?>

			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario">
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="upload" value="1">
				<input type="hidden" name="business" value="moisesdanielmontano@gmail.com">			
				<input type="hidden" name="currency_code" value="USD">

				<?php  
					for ($i=0; $i < count($datos); $i++) 
					{
				?>

					<input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Nombre'];?>">
					<input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
					<input type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">
				
				<?php 
					}
				?>

				<center><input type="submit" value="Comprar" class="aceptar" style="width:200px"></center>
			</form>

		<?php
		}

		?>
		<center><a href="./">Ver Catalogo</a></center>
	
	</section>
<?php 	include "include/footer.php" ?>