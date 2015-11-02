<?php include 'include/header.php' ?><script src="<?php echo htmlspecialchars('' . ($base_url) . '/js/scripts.js', ENT_QUOTES, 'UTF-8'); ?>"></script><?php
	$producto = getProductoPorId($_GET["id"],false);
	$count = count($producto);
?><?php  ?><section id="body" class="col-md-6 col-lg-6 col-sm-12 col-xs-12"><?php if ($count > 0) {	
	$producto = $producto[0]; 
	if (isset($_SESSION["usuario"])) 
		productoVisto($_GET["id"], $_SESSION["usuario"]["Id"]);
?><div class="producto row"><div class="col-md-5 col-lg-5 col-sm-6 col-xs-12"><span class="producto-precio"><?php echo htmlspecialchars($producto['precio'], ENT_QUOTES, 'UTF-8'); ?></span><a href="<?php echo htmlspecialchars('./detalles.php?id=' . ($producto[0]) . '', ENT_QUOTES, 'UTF-8'); ?>" class="producto-image-container"><img src="<?php echo htmlspecialchars('./productos/' . ($producto[6]) . '', ENT_QUOTES, 'UTF-8'); ?>"/></a></div><div class="producto-detalles col-md-7 col-lg-7 col-sm-6 col-xs-12"><h2 class="producto-nombre"><?php echo $producto['nombre']; ?></h2><p class="producto-descripcion"><?php echo $producto['descripcion']; ?></p><p class="producto-descripcion-precio">Precio: <?=$producto['precio']?></p><a href="<?php echo './carritodecompras.php?id=' . ($producto[0]) . ''; ?>" class="btn btn-primary">Añadir al Carrito de Comprass
</a></div></div><div class="ProductosRelacionados"><?php include 'productosrelacionados.php' ?></div><?php } else { ?><div role="alert" class="alert alert-warning">No hay productos a mostrar</div><?php } ?></section><?php include 'include/footer.php' ?>