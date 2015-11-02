<?php include 'include/header.php'; ?>
	<section class="container">
	<?php
		$count = 0;
		$categorias = isset($_GET["idcategoria"])?getCategorias($_GET["idcategoria"]):getCategorias();
		echo count($categorias)>0?"":'<script>window.location.href="' . $base_url . '";</script>';
		foreach ($categorias as $key => $categoria) {
			$productos = isset($_GET["nombre"])?getProductoPorCategoria($categoria['idcategoria'],$_GET["nombre"]):getProductoPorCategoria($categoria['idcategoria']);
			if (count($productos)>0) {
				echo "<h3>".$categoria['nombre']."</h3><hr/>";
				echo "<div class='row'>";	
			}
			$count += count($productos);
			foreach ($productos as $key => $producto) {
		?>
			<!-- <div class="col-md-2 col-lg-2 col-sm-3 col-xs-12 producto-container"> -->
			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 producto-container">
				<div class="producto">
					<span class='producto-precio'>$<?=$producto['precio'];?></span>
					<a href="./detalles.php?id=<?=$producto['id']; ?>">
						<img class="fixed-height" src="./productos/<?=$producto['imagen'];?>">
						<h2 class='producto-nombre'><?=$producto['nombre'];?></h2>
					</a>
					<div class="producto-detalles">
					<!-- Agregando comentareo -->
						<!-- <a class='btn btn-success' href="./detalles.php?id=<?=$producto['id']; ?>">Detalles</a> -->
						<a class='btn btn-primary' href="./carritodecompras.php?id=<?=$producto['id']; ?>">Agregar al carrito</a>
					</div>
				</div>
			</div>
		<?php		
			}
			echo "</div>";
		}
		echo $count<=0?"<div class='alert alert-warning' role='alert'>No hay productos a mostrar</div>":"";
		?>
	</section>

<?php include 'vistasrecientes.php'; ?>

<?php include 'include/footer.php'; ?>