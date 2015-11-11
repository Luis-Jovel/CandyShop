<?php
	session_start();
	include "../variables.php";
	$Paquete = isset($_POST["seleccion"]) ? $_POST["seleccion"]:"";

	if ($Paquete == "Infantil")
	{
		?>
			<table>
				<tr>
					<td>
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_cantidad_de_adultos']:$language['spanish']['label_cantidad_de_adultos']?>:</td>
					<td><input type="number" required name="adultos" id="adultos" size="4"></td>
				</tr>
				<tr>
					<td>
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_cantidad_de_ninas']:$language['spanish']['label_cantidad_de_ninas']?>:
					</td>
					<td><input type="number" required name="ninias" id="ninias" size="4"></td>
				</tr>
				<tr>
					<td>
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_cantidad_de_ninos']:$language['spanish']['label_cantidad_de_ninos']?>:
					</td>
					<td><input type="number" required name="ninios" id="ninios" size="4"></td>
				</tr>
				<tr>
					<td>
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_pastel']:$language['spanish']['label_pastel']?>:
					</td>
					<td><input type="checkbox" name="pastel" id="pastel" value="1" checked></td>
				</tr>
				<tr>
					<td>
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_pinata']:$language['spanish']['label_pinata']?>:
					</td>
					<td><input type="checkbox" name="piniata" id="piniata" value="1" checked></td>
				</tr>
				<tr>
					<td>
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_animador']:$language['spanish']['label_animador']?>:
					</td>
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
					<td>
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_cantidad_de_personas']:$language['spanish']['label_cantidad_de_personas']?>:
					</td>
					<td><input type="number" required name="personas" id="personas" size="4"></td>
				</tr>
				<tr>
					<td>
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_pastel']:$language['spanish']['label_pastel']?>:
					</td>
					<td><input type="checkbox" name="pastel" id="pastel" value="1" checked></td>
				</tr>
				<tr>
					<td>
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_pinata']:$language['spanish']['label_pinata']?>:
					</td>
					<td><input type="checkbox" name="piniata" id="piniata" value="1"></td>
				</tr>
			</table>

		<?php		
	}

?>