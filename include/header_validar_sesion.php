<?php
	include "header.php";
	if(!array_key_exists('usuario',$_SESSION) || empty($_SESSION['usuario']) || !isset($_SESSION)) {
		//estoy usando esto porque no me funciono la forma tradicional no se por qué
		echo '<script>window.location.href="' . $base_url."/user_login.php" . '";</script>';
	}
?>