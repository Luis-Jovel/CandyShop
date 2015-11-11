<?php 
	session_start();
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'/variables.php');
	require_once(__ROOT__.'/conexion.php'); 
	include "funciones/consultas.php";

	if( isset($_GET['ES']) ){
		$_SESSION['idioma'] = "ES";
	} else if (isset($_GET['EN'])){
		$_SESSION['idioma'] = "EN";
	}	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Candy Shop</title>
	<!-- <link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/estilos.css"> -->
	<link rel="shortcut icon" href="<?=$base_url?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=$base_url?>/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/bootstrap.css"/>	
	<link rel="stylesheet" type="text/css" href="<?=$base_url?>/css/font-awesome.min.css"/>	
	<script src="<?=$base_url?>/js/jquery.js"></script>
	<script src="<?=$base_url?>/js/bootstrap.js"></script>
	<script src="<?=$base_url?>/js/paquetes.js"></script>
	<script src="<?=$base_url?>/js/ajax.js"></script>
	<script type="text/javascript">
		function Paquete(){
        	var buscar = document.getElementsByName("cmbPaquete")[0].value;
        	cargarPags('ContainerPackage',buscar,'./compras/TipoPaquete.php');
      	}
	</script> 
</head>
<body>

	<!-- MODAL PARA CREACION DE PAQUETES -->
	<form method="POST" action="./compras/paquetes.php">
		<div class="modal fade" id="modal-paquete">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_crea_tu_paquete']:$language['spanish']['label_crea_tu_paquete']?></h4>
					</div>
					<div class="modal-body">						
						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_tu_fiesta_es']:$language['spanish']['label_tu_fiesta_es']?>
						<select name="cmbPaquete" id="cmbPaquete" onchange="Paquete();">							
							<option value="Infantil">
								<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_infantil']:$language['spanish']['label_infantil']?>
							</option>
							<option value="Tradicional">
								<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_tradicional']:$language['spanish']['label_tradicional']?>
							</option>
						</select><BR><BR>
						<div id="ContainerPackage">
							<table>
								<tr>
									<td>
										<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_cantidad_de_adultos']:$language['spanish']['label_cantidad_de_adultos']?>:</td>
									<td><input type="number" name="adultos" id="adultos" size="4"></td>
								</tr>
								<tr>
									<td>
										<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_cantidad_de_ninas']:$language['spanish']['label_cantidad_de_ninas']?>:
									</td>
									<td><input type="number" name="ninias" id="ninias" size="4"></td>
								</tr>
								<tr>
									<td>
										<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_cantidad_de_ninos']:$language['spanish']['label_cantidad_de_ninos']?>:
									</td>
									<td><input type="number" name="ninios" id="ninios" size="4"></td>
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
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</form>

<!-- FIN MODAL PARA CREACION DE PAQUETES -->

	<header>
		<div class="container-fluid">
			<span id="cambiar_idioma">				
				<a href="<?=$base_url?>?ES">Esp</a>/<a href="<?=$base_url?>?EN">Eng</a>
			</span>
			<div class="logo">
				<a class="col-md-4 col-lg-4 col-sm-12 col-xs-12" href="<?=$base_url?>">
					<img src="<?=$base_url?>/imagenes/logo.png" alt="">
				</a>
				<form action="<?=$base_url?>" method="get">
					
			 		<div id="container-buscar" class="input-group col-md-8 col-lg-8 col-sm-12 col-xs-12">
						<div class="input-group-btn">
							<select name="idcategoria" id="header_cat" class="form-control">
								<option value="%" default>
									<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_todo']:$language['spanish']['label_todo']?>
								</option>
								<?php 
									$categorias = getCategorias();
									foreach ($categorias as $key => $value) {
								?>
								<option value="<?=$value['idcategoria']?>">
									<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$value['nombre_EN']:$value['nombre']?>
								</option>
								<?php		
									}
								?>
							</select>
						</div><!-- /btn-group -->
						<input type="text" class="form-control" placeholder="<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_buscar']:$language['spanish']['label_buscar']?>" id="txtbuscar" name="nombre" />
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
        				<li class="active"><a href="<?=$base_url?>"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_catalogo']:$language['spanish']['label_catalogo']?> <span class="sr-only">(current)</span></a></li>
        				<li class="dropdown">
          					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          						<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_productos']:$language['spanish']['label_productos']?>
          						<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
								<?php 
								$categorias = getCategorias();
									foreach ($categorias as $key => $categoria) {
								?>
									<li>
										<a id='cat_<?=$categoria['idcategoria']?>' href="<?=$base_url?>?idcategoria=<?=$categoria['idcategoria']?>">
											<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$categoria['nombre_EN']:$categoria['nombre']?>
										</a>
									</li>
								<?php		
									}
								?>
								</ul>
        					</li>
        					<li>
        						<a href="#" id="menu-paquete"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_crea_tu_paquete']:$language['spanish']['label_crea_tu_paquete']?> <i class="fa fa-birthday-cake"></i></a>
    						</li>
      				</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							$usuario_label = ((isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN"))?$language['english']['label_invitado']:$language['spanish']['label_invitado'];
							$login_menu = array("enlace"=>"user_login", "label" =>((isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN"))?$language['english']['label_iniciar_sesion']:$language['spanish']['label_iniciar_sesion']);
							if (isset($_SESSION["usuario"])) {
								$usuario_label = $_SESSION["usuario"]["Nombre"]." ".$_SESSION["usuario"]["Apellido"];
								$login_menu["enlace"] = "logout";
								$login_menu["label"] = ((isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN"))?$language['english']['label_cerrar_sesion']:$language['spanish']['label_cerrar_sesion'];
							}
						?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_bienvenido']:$language['spanish']['label_bienvenido']?> <?=$usuario_label?>
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
	<section class="container-fluid">
	<?php include "panel_recomendados.php" ?>