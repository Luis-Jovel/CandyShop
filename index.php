<?php include 'include/header.php'; ?>
	<section class="container">
	<?php
		$categorias = isset($_GET["idcategoria"])?getCategorias($_GET["idcategoria"]):getCategorias();
		echo count($categorias)>0?"":'<script>window.location.href="' . $base_url . '";</script>';
		foreach ($categorias as $key => $categoria) {
			$productos = getProductoPorCategoria($categoria['idcategoria']);
			echo "<h3>".$categoria['nombre']."</h3><hr/>";
			echo "<div class='row'>";
			echo count($productos)<=0?"<div class='alert alert-warning' role='alert'>No hay productos a mostrar</div>":"";
			foreach ($productos as $key => $producto) {
		?>
			<!-- <div class="col-md-2 col-lg-2 col-sm-3 col-xs-12 producto-container"> -->
			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 producto-container">
				<div class="producto">
					<span class='producto-precio'>$<?=$producto['precio'];?></span>
					<a href="./detalles.php?id=<?=$producto['id']; ?>">
						<img src="./productos/<?=$producto['imagen'];?>">
					</a>
					<div class="producto-detalles">
						<h2 class='producto-nombre'><?=$producto['nombre'];?></h2>
						<a class='btn btn-success' href="./detalles.php?id=<?=$producto['id']; ?>">Detalles</a>
					</div>
				</div>
			</div>
		<?php		
			}
			echo "</div>";
		}
		?>
	</section>
<?php include 'include/footer.php'; ?>