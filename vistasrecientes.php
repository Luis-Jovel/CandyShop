<?php 	$produc = getUltimasVistas(); ?>
<?php foreach ($produc as $key): ?>
	<a href="detalles.php?id=<?=$key["idProducto"] ?> "><?= $key['sNombre'] ?></a><br>				
<?php endforeach ?>


