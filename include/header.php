<?php 
	session_start();
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'/variables.php');
	require_once(__ROOT__.'/conexion.php'); 
	include "funciones/consultas.php";
	//dejar al usuario "quemado"
	//$_SESSION["usuario"] = array("idusuario"=>1, "Nombre"=>"Moises");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Candy Shop</title>
	<!-- <link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/estilos.css"> -->
	<link rel="shortcut icon" href="<?=$base_url?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=$base_url?>/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/bootstrap.css"/>	
	<link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/font-awesome.min.css"/>	
	<script src="<?=$base_url?>/js/jquery.js"></script>
	<script src="<?=$base_url?>/js/bootstrap.js"></script>
</head>
<body>
	<header>
		<div class="container-fluid">
			<div class="logo">
				<a class="col-md-4 col-lg-4 col-sm-12 col-xs-12" href="<?=$base_url?>">
					<img src="<?=$base_url?>/imagenes/logo.png" alt="">
				</a>
				<form action="<?=$base_url?>" method="get">
			 		<div id="container-buscar" class="input-group col-md-8 col-lg-8 col-sm-12 col-xs-12">
						<div class="input-group-btn">
							<select name="idcategoria" id="" class="form-control">
								<option value="%" default>Todo</option>
								<?php 
									$categorias = getCategorias();
									foreach ($categorias as $key => $value) {
								?>
								<option value="<?=$value['idcategoria']?>"><?=$value['nombre']?></option>
								<?php		
									}
								?>
							</select>
						</div><!-- /btn-group -->
						<input type="text" class="form-control" placeholder="Buscar" id="txtbuscar" name="nombre" />
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
	        </div>
		</div>
		<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
      				<!-- <a class="navbar-brand" href="#">Brand</a> -->
    			</div>

    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      				<ul class="nav navbar-nav">
        				<li class="active"><a href="<?=$base_url?>">Catálogo <span class="sr-only">(current)</span></a></li>
        				<li class="dropdown">
          					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
								<?php 
								$categorias = getCategorias();
									foreach ($categorias as $key => $categoria) {
								?>
									<li><a id='cat_<?=$categoria['idcategoria']?>' href="<?=$base_url?>?idcategoria=<?=$categoria['idcategoria']?>"><?=$categoria['nombre']?></a></li>
								<?php		
									}
								?>
								</ul>
        					</li>
      				</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							$usuario_label = "Invitado";
							$login_menu = array("enlace"=>"user_login", "label" =>"Iniciar Sesión");
							if (isset($_SESSION["usuario"])) {
								$usuario_label = $_SESSION["usuario"]["Nombre"]." ".$_SESSION["usuario"]["Apellido"];
								$login_menu["enlace"] = "logout";
								$login_menu["label"] = "Cerrar Sesión";
							}
						?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Bienvenido <?=$usuario_label?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?=$base_url?>/<?=$login_menu['enlace']?>.php"><?=$login_menu['label']?></a></li>
							</ul>
	    				</li>
						<li>
						    <a class='btn-carrito' href="./carritodecompras.php">
								<img src="./imagenes/carrito.png">
						    </a>
						</li>
					</ul>
    			</div>
  			</div>
		</nav>
	</header>