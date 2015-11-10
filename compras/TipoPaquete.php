<?php

	$Paquete = isset($_POST["seleccion"]) ? $_POST["seleccion"]:"";

	if ($Paquete == "Infantil")
	{
		?>
			<table>
				<tr>
					<td>Cantidad de Adultos:</td>
					<td><input type="text" name="adultos" id="adultos" size="4"></td>
				</tr>
				<tr>
					<td>Cantidad de Ni&ntilde;as:</td>
					<td><input type="text" name="ninias" id="ninias" size="4"></td>
				</tr>
				<tr>
					<td>Cantidad de Ni&ntilde;os:</td>
					<td><input type="text" name="ninios" id="ninios" size="4"></td>
				</tr>
				<tr>
					<td>Pastel:</td>
					<td><input type="checkbox" name="pastel" id="pastel" value="1" checked></td>
				</tr>
				<tr>
					<td>Pi&ntilde;ata:</td>
					<td><input type="checkbox" name="piniata" id="piniata" value="1" checked></td>
				</tr>
				<tr>
					<td>Animador:</td>
					<td><input type="checkbox" name="animador" id="animador" value="1" checked></td>
				</tr>
			</table>

		<?php
	}
	else if ($Paquete == "Tradicional")
	{
		?>

			<table>
				<tr>
					<td>Cantidad de Personas:</td>
					<td><input type="text" name="personas" id="personas" size="4"></td>
				</tr>
				<tr>
					<td>Pastel:</td>
					<td><input type="checkbox" name="pastel" id="pastel" value="1" checked></td>
				</tr>
				<tr>
					<td>Pi&ntilde;ata:</td>
					<td><input type="checkbox" name="piniata" id="piniata" value="1"></td>
				</tr>
			</table>

		<?php		
	}

?>