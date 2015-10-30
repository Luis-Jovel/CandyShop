<?php 
	session_start();
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once('variables.php');
	session_unset();
	echo '<script>window.location.href="' . $base_url. '";</script>';
?>