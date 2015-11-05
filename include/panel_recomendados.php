<section id="recomendaciones" class="col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12"><?php if (isset($_SESSION["usuario"])) {
$productos = getProductoRecomendados($_SESSION["usuario"]["Id"]); ?><h4><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_recomendados_para_ti']:$language['spanish']['label_recomendados_para_ti']?></h4><hr/><?php foreach ($productos as $producto) { ?><div class="reciente col-lg-12 col-md-12 col-sm-3 col-xs-3"><div class="producto col-lg-8 col-lg-offset-2 col-md-12"><a href="<?php echo htmlspecialchars('./detalles.php?id=' . ($producto->id) . '', ENT_QUOTES, 'UTF-8'); ?>"><img src="<?php echo htmlspecialchars('./productos/' . ($producto->imagen) . '', ENT_QUOTES, 'UTF-8'); ?>"/><span><?php echo $producto->nombre; ?></span></a></div></div><?php }
} ?></section>