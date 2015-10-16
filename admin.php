<?php
	include "conexion.php";
	session_start();

	if (isset($_SESSION['Usuario'])) 
	{
		
	}
	else
	{
		header("Location: ./index.php?Error=Acceso Denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<div class="titulo">
			<a href="./carritodecompras.php" title="ver carrito de compras" class="menuLink">
				<img src="./imagenes/carrito.png">
			</a>
		</div>
	</header>
	<section>
	<nav class="menu2">
	  <menu>
	    <li><a href="./">Inicio</a></li>
	    <li><a href="#" class="selected">Admin</a></li>
	    <li><a href="./admin/agregarproducto.php" >Agregar</a></li>
	    <li><a href="./admin/modificar.php" >Modificar</a></li>
	    <li><a href="./login/cerrar.php">Salir</a></li>
	  </menu>
	</nav>

	<center><h1>Últimas Compras</h1></center>
	<table border="0px" width="100%">	
		<tr>
			<td>Imagen</td>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
		</tr>	

		<?php
			$query = "select * from compras";
			$cmd = $db->query($query);

			$numeroventa=0;
			while ($i = $cmd->fetch_assoc()) {
				if($numeroventa	!=$i['numeroventa']){
					echo '<tr><td>Compra Número: '.$i['numeroventa'].' </td></tr>';
				}
				$numeroventa=$i['numeroventa'];
				echo '<tr>
					<td><img src="./productos/'.$i['imagen'].'" width="100px" heigth="100px" /></td>
					<td>'.$i['nombre'].'</td>
					<td>'.$i['precio'].'</td>
					<td>'.$i['cantidad'].'</td>
					<td>'.$i['subtotal'].'</td>

				</tr>';
			}
		?>
	</table>
	</section>
</body>
</html>