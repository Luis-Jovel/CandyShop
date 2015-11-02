<<<<<<< HEAD
<?php include 'include/header.php' ?><script src="<?php echo htmlspecialchars('' . ($base_url) . '/js/scripts.js', ENT_QUOTES, 'UTF-8'); ?>"></script><?php
	$producto = getProductoPorId($_GET["id"],false);
	$count = count($producto);
?><section id="body" class="col-md-8 col-lg-8 col-sm-12 col-xs-12"><?php if ($count > 0) {	
=======
<?php include 'include/header.php' ?><script src="<?php echo htmlspecialchars('' . ($base_url) . '/js/scripts.js', ENT_QUOTES, 'UTF-8'); ?>"></script><?php $producto = getProductoPorId($_GET["id"],false);	
$count = count($producto); ?><section class="container"><?php if ($count > 0) {	
>>>>>>> master
	$producto = $producto[0]; 
	if (isset($_SESSION["usuario"])) 
		productoVisto($_GET["id"], $_SESSION["usuario"]["Id"]);
?><div class="producto"><div class="col-md-5 col-lg-5 col-sm-6 col-xs-12"><span class="producto-precio"><?php echo htmlspecialchars($producto['precio'], ENT_QUOTES, 'UTF-8'); ?></span><a href="<?php echo htmlspecialchars('./detalles.php?id=' . ($producto[0]) . '', ENT_QUOTES, 'UTF-8'); ?>" class="producto-image-container"><img src="<?php echo htmlspecialchars('./productos/' . ($producto[6]) . '', ENT_QUOTES, 'UTF-8'); ?>"/></a></div><div class="producto-detalles col-md-7 col-lg-7 col-sm-6 col-xs-12"><h2 class="producto-nombre"><?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES, 'UTF-8'); ?></h2><p class="producto-descripcion"><?php echo htmlspecialchars($producto['descripcion'], ENT_QUOTES, 'UTF-8'); ?></p><p class="producto-descripcion-precio">Precio: <?=$producto['precio']?></p><a href="<?php echo './carritodecompras.php?id=' . ($producto[0]) . ''; ?>" class="btn btn-primary">Añadir al Carrito de Compras</a></div></div><?php } else { ?><div role="alert" class="alert alert-warning">No hay productos a mostrar</div><?php } ?></section><?php include 'include/footer.php' ?>