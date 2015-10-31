<?php include 'include/header.php'; ?>
<script src="<?=$base_url?>/js/scripts.js"></script>
<section class="container">
<?php
	$producto = getProductoPorId($_GET["id"]);
	$producto = $producto[0];
?>			
	<div class="producto">
		<div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">
			<span class='producto-precio'>$<?=$producto['precio'];?></span>
			<a class="producto-image-container"	href="./detalles.php?id=<?=$producto['id']; ?>">
				<img src="./productos/<?=$producto['imagen'];?>">
			</a>
		</div>
		<div class="producto-detalles col-md-7 col-lg-7 col-sm-6 col-xs-12">
			<h2 class='producto-nombre'><?=$producto['nombre'];?></h2>
			<p class="producto-descripcion"><?=$producto['descripcion'];?></p>
			<p class="producto-descripcion-precio">Precio: <?=$producto['precio'];?></p>
			<a  class="btn btn-primary" href="./carritodecompras.php?id=<?=$producto['id']; ?>">Añadir al Carrito de Compras</a>
		</div>
	</div>		
</section>
<?php include 'include/footer.php'; ?>