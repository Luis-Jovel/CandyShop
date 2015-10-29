<?php
	require_once(__ROOT__.'/conexion.php'); 
	function getCategorias(){
		$query = "SELECT * FROM categoria order by idcategoria asc";
		global $db;
		$cmd = $db->query($query);
		$rows = array();
		while ($row = $cmd->fetch_assoc()) {
			array_push($rows, $row);
		}
		return $rows;
	}
?>