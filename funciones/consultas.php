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
	function getProductoPorCategoria($idcategoria="%", $nombre_poducto="%"){
		global $db;
		$stmt = $db->prepare("SELECT * FROM productos WHERE idcategoria LIKE ? AND nombre LIKE ?");
		$tipo = $idcategoria=="%"?"s":"i";
		$nombre_poducto = "%".$nombre_poducto."%";
		$stmt->bind_param($tipo."s",$idcategoria,$nombre_poducto);
		$rows = array();
		if ($stmt->execute()) {
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()) {
				array_push($rows, $row);
			}
		}
		return $rows;
	}
	function getProductoPorId($id="%", $assoc = true){
		global $db;
		$stmt = $db->prepare("SELECT * FROM productos WHERE Id LIKE ?");
		$tipo = $id=="%"?"s":"i";
		$stmt->bind_param($tipo,$id);
		$rows = array();
		if ($stmt->execute()) {
			$result = $stmt->get_result();

			if ($assoc) {
				while ($row = $result->fetch_assoc()) {
					array_push($rows, $row);
				}
			} else {
				while ($row = $result->fetch_array()) {
					array_push($rows, $row);
				}
			}

		}
		return $rows;
	}
	function productoVisto($idproducto, $idusuario){
		global $db;
		$stmt = $db->prepare("INSERT INTO visita (idproducto, idusuario) VALUES (?, ?)");
		$stmt->bind_param("ii",$idproducto, $idusuario);
		$stmt->execute();
		$stmt->close();
	}
	// Funcion para Mostrar las ultimas vistas
	function getUltimasVistas()
	{
		global $db;
		$query = "SELECT pt.* FROM visita as vt INNER JOIN productos as pt on vt.idproducto = pt.id group by pt.id ORDER BY vt.idvisita limit 0,4" ;
		$stmt = $db->query($query);
		$rows = array();		
		while ($row = $stmt->fetch_object()) {
			$rows[]	= array(
				'idProducto' => $row->id,
				'sNombre'=>$row->nombre
				);
		}
		return $rows;
	}
	function getProductoRelacionado($id="%"){
		global $db;
		$idcategoria = "";
		$Producto = getProductoPorId($id,false);
		foreach ($Producto as $key) {
			$idcategoria = $key["id"];
		}
		
		$stmt = $db->prepare("SELECT pt.* FROM productos as pt WHERE idcategoria = ?");
		$stmt->bind_param("i",$idcategoria);
		$rows = array();
		if ($stmt->execute()) {
			$result = $stmt->get_result();
			while ($row = $result->fetch_object()) {
				array_push($rows, $row);
			}
		}
		return $rows;
	}
?>