<?php include 'include/header.php' ?><div id="body" class="col-md-6 col-lg-6 col-sm-12 col-xs-12"><?php /* <?php */
$count = 0;
$categorias = isset($_GET["idcategoria"])?getCategorias($_GET["idcategoria"]):getCategorias();
echo count($categorias)>0?"":'<script>window.location.href="' . $base_url . '";</script>';
foreach ($categorias as $key => $categoria) {
 $productos = isset($_GET["nombre"])?getProductoPorCategoria($categoria['idcategoria'],$_GET["nombre"]):getProductoPorCategoria($categoria['idcategoria']);
 if (count($productos)>0) {
  echo "<h3>".(((isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN"))?$categoria['nombre_EN']:$categoria['nombre'])."</h3><hr/>";
  echo "<div class='row'>";	
 }
 $count += count($productos); ?><?php foreach ($productos as $key => $producto) { ?><div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 producto-container"><div class="producto"><span class="producto-precio">$<?=$producto['precio'];?></span></span><a href="<?php echo htmlspecialchars('./detalles.php?id=' . ($producto[0]) . '', ENT_QUOTES, 'UTF-8'); ?>"><img src="<?php echo htmlspecialchars('./productos/' . ($producto[6]) . '', ENT_QUOTES, 'UTF-8'); ?>" class="fixed-height"/><h2 class="producto-nombre"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$producto['nombre_EN']:$producto['nombre']?></h2></h2></a><div class="producto-detalles"><a href="<?php echo htmlspecialchars('./carritodecompras.php?id=' . ($producto[0]) . '', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_añadir_al_carrito_de_compras']:$language['spanish']['label_añadir_al_carrito_de_compras']?></a></div></div></div><?php } ?><?php echo "</div>"; // .row
}
$msg = (isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_no_hay_productos_a_mostrar']:$language['spanish']['label_no_hay_productos_a_mostrar'];
echo $count<=0?"<div class='alert alert-warning' role='alert'>$msg</div>":""; ?></div><?php include 'include/footer.php' ?>