<?php include 'include/header.php'; ?>
<script src="<?=$base_url?>/js/scripts.js"></script>
	<section>
		
	<?php
		include 'conexion.php';
		$query = "SELECT * FROM productos WHERE id=" . $_GET['id'];
		$cmd = $db->query($query);
		
		while ($i = $cmd->fetch_assoc()) {
		?>			
			<center>
				<img src="./productos/<?php echo $i['imagen'];?>" height="320" width="320"><br>
				<span><?php echo $i['nombre'];?></span><br>
				<p><?php echo $i['descripcion'];?></p>
				<span>Precio: $<?php echo $i['precio'];?></span><br>
				<a href="./carritodecompras.php?id=<?php echo $i['id']; ?>">Añadir al Carrito de Compras</a>
			</center>		
	<?php
		}
	?>

	</section>
<?php include 'include/footer.php'; ?>