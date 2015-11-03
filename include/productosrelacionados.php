<br><br>
<h4><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_productos_similares']:$language['spanish']['label_productos_similares']?></h4>
<?php $Productos = getProductoRelacionado($_GET["id"]);?>
<?php foreach ($Productos as $Producto): ?>
	<div class="producto col-lg-3 col-md-6 col-sm-6">
		<a href="detalles.php?id=<?= $Producto->id ?>">
			<img src="./productos/<?= $Producto->imagen ?>" alt="<?= $Producto->nombre ?>">
			<span><?= $Producto->nombre ?></span>
		</a>
	</div>			
<?php endforeach ?>