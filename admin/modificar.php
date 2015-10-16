<?php
	session_start();
	include "../conexion.php";
	if(isset($_SESSION['Usuario'])){
	}else{
		header("Location: ./index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../js/modificar.js"></script>
</head>
<body>
	<header>
		<div class="titulo">
			<a href="./carritodecompras.php" title="ver carrito de compras" class="menuLink">
				<img src="../imagenes/carrito.png">
			</a>
		</div>
	</header>
	<section>
		<nav class="menu2">
			<menu>
				<li><a href="../">Inicio</a></li>
				<li><a href="../admin.php">Ultimas Compras</a></li>
	    		<li><a href="agregarproducto.php" >Agregar</a></li>
	    		<li><a href="modificar.php" class="selected">Modificar</a></li>
	    		<li><a href="../login/cerrar.php">Salir</a></li>
			</menu>
		</nav>
		<h1>MODIFICAR Y/O ELIMINAR</h1>
		<table width="100%">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Eliminar</td>
				<td>Modificar</td>
			</tr>
			<?php
				$query = "SELECT * FROM productos";
				$cmd = $db->query($query);
				
				while ($i = $cmd->fetch_assoc())
				{
					echo '
					<tr>
						<td>
							<input type="hidden" value="'.$i['id'].'">'.$i['id'].'
							<input type="hidden" class="imagen" value="'.$i['imagen'].'">
						</td>
						<td><input type="text" class="nombre" value="'.$i['nombre'].'"></td>
						<td><input type="text" class="descripcion" value="'.$i['descripcion'].'"></td>
						<td><input type="text" class="precio" value="'.$i['precio'].'"></td>
						<td><button class="eliminar" data-id="'.$i['id'].'">Eliminar</button></td>
						<td><button class="modificar" data-id="'.$i['id'].'">Modificar</button></td>
					</tr>
					';
				}
			?>
		</table>	
	</section>
</body>
</html>