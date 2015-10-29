<?php include 'include/header.php'; ?>
	<section class="container">
		
	<?php
		$query = "SELECT * FROM productos";
		$cmd = $db->query($query);
		
		while ($i = $cmd->fetch_assoc()) {
		?>
			<!-- <div class="col-md-2 col-lg-2 col-sm-3 col-xs-12 producto-container"> -->
			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 producto-container">
				<div class="producto">
					<span class='producto-precio'>$<?php echo $i['precio'];?></span>
					<a href="./detalles.php?id=<?php echo $i['id']; ?>">
						<img src="./productos/<?php echo $i['imagen'];?>">
					</a>
					<div class="producto-detalles">
						<h2 class='producto-nombre'><?php echo $i['nombre'];?></h2>
						<a class='btn btn-success' href="./detalles.php?id=<?php echo $i['id']; ?>">Detalles</a>
					</div>
				</div>
			</div>
	<?php
		}
	?>
	</section>
<?php include 'include/footer.php'; ?>