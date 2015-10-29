<?php 
	$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');
	define('__ROOT__', dirname(dirname(__FILE__))); 
	require_once(__ROOT__.'/conexion.php'); 
	include "funciones/consultas.php";
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
				</a><!--
			 --><div id="container-buscar" class="input-group col-md-8 col-lg-8 col-sm-12 col-xs-12">
					<div class="input-group-btn">
						<select name="" id="" class="form-control">
							<option value="%" default>Todo</option>
							<?php 
								$categorias = getCategorias();
								foreach ($categorias as $key => $value) {
							?>
							<option value="<?=$value['idcategoria']?>"><?=$value['nombre']?></option>
							<?php		
								}
							?>
							<!-- 
							
							<option value="" default>Reposteria</option>
							<option value="" default>Decoración</option>
							<option value="" default>Cubertería</option>
							<option value="" default>Piñatas</option>
							<option value="" default>Animadores</option> -->
						</select>
					</div><!-- /btn-group -->
					<input type="text" class="form-control" placeholder="Buscar" id="txtbuscar" />
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div><!--
	     --></div>
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
									foreach ($categorias as $key => $value) {
								?>
									<li><a id='cat_<?=$value['idcategoria']?>' href="#"><?=$value['nombre']?></a></li>
								<?php		
									}
								?>
								</ul>
        					</li>
      				</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
						    <a class='btn-carrito' href="./carritodecompras.php">
								<img src="./imagenes/carrito.png">
						    </a>
						</li>
					</ul>
					<!-- <form class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Buscar">
						</div>
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</form> -->
    			</div>
  			</div>
		</nav>
		<!-- <div class="titulo">
			<a href="" title="ver carrito de compras">
				<img src="./imagenes/carrito.png">
			</a>
		</div>		 -->
	</header>
