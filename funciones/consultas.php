<?php
	require_once(__ROOT__.'/conexion.php');
	//$query = "SELECT * FROM categoria order by idcategoria asc";
	function getCategorias($id="%"){
		global $db;
		$stmt = $db->prepare("SELECT * FROM categoria WHERE idcategoria LIKE ? ORDER BY idcategoria asc");
		$tipo = $id=="%"?"s":"i";
		$stmt->bind_param($tipo,$id);	
		$rows = array();
		if ($stmt->execute()) {
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()) {
				array_push($rows, $row);
			}
		}
		return $rows;
	}
	function getUsuario($id="%"){
		global $db;
		$stmt = $db->prepare("SELECT * FROM usuarios WHERE Id LIKE ?");
		$tipo = $id=="%"?"s":"i";
		$stmt->bind_param($tipo,$id);
		$rows = array();
		if ($stmt->execute()) {
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()) {
				array_push($rows, $row);
			}
		}
		return $rows;
	}
	function getProductoPorCategoria($idcategoria="%"){
		global $db;
		$stmt = $db->prepare("SELECT * FROM productos WHERE idcategoria LIKE ?");
		$tipo = $idcategoria=="%"?"s":"i";
		$stmt->bind_param($tipo,$idcategoria);
		$rows = array();
		if ($stmt->execute()) {
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()) {
				array_push($rows, $row);
			}
		}
		return $rows;
	}
?>