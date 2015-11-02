<br><br>
<h4>Productos Similares</h4>
<?php $Productos = getProductoRelacionado($_GET["id"]);?>
<?php foreach ($Productos as $Producto): ?>
	<div class="producto col-lg-3 col-md-6 col-sm-6">
		<img src="./productos/<?= $Producto->imagen ?>" alt="<?= $Producto->nombre ?>">
		<a href="detalles.php?id=<?= $Producto->id ?>"><?= $Producto->nombre ?></a>
	</div>			
<?php endforeach ?>