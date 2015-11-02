
<?php $Productos = getProductoRelacionado($_GET["id"]);?>
<?php foreach ($Productos as $Producto): ?>
	<a href="detalles.php?id=<?= $Producto->id ?>"><?= $Producto->nombre ?></a>
<?php endforeach ?>