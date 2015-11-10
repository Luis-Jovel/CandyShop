<?php 
	
	$TipoPaquete = isset($_POST['cmbPaquete']) ? $_POST['cmbPaquete'] : "";
	
	if ($TipoPaquete == "Infantil")
	{
		$Adultos = isset($_POST['adultos']) ? $_POST['adultos'] : "";
		$Ninias = isset($_POST['ninias']) ? $_POST['ninias'] : "";
		$Ninios = isset($_POST['ninios']) ? $_POST['ninios'] : "";
		$Pastel = isset($_POST['pastel']) ? $_POST['pastel'] : "";
		$Piniata = isset($_POST['piniata']) ? $_POST['piniata'] : "";
		$Payaso = isset($_POST['payaso']) ? $_POST['payaso'] : "";

		echo "Adultos " . $Adultos . "<br>";
		echo "Niñas " . $Ninias . "<br>";
		echo "Niños " . $Ninios . "<br>";
		if ($Pastel == 1)
			echo "Pastel " . $Pastel . "<br>";
		if ($Piniata == 1)
		echo "Piñata " . $Piniata . "<br>";
		if ($Payaso == 1)
		echo "Payaso " . $Payaso . "<br>";
	}
	else if ($TipoPaquete == "Tradicional")
	{
		$Personas = isset($_POST['personas']) ? $_POST['personas'] : "";
		$Pastel = isset($_POST['pastel']) ? $_POST['pastel'] : "";
		$Piniata = isset($_POST['piniata']) ? $_POST['piniata'] : "";

		echo "Personas " . $Personas . "<br>";
		if ($Pastel == 1)
			echo "Pastel " . $Pastel . "<br>";
		if ($Piniata == 1)
			echo "Piñata " . $Piniata . "<br>";
	}

?>