<?php
	include 'include/header.php';
	require_once("funciones/consultas.php");
	if (isset($_POST["submit"])) {
		$usuario = getUsuario($_POST["idusuario"]);
		if (count($usuario)>0) {
			$_SESSION["usuario"] = $usuario[0];
			echo '<script>window.location.href="' . $base_url. '/carritodecompras.php";</script>';
		}
	}
?>
	<section class="container">
		<div class="panel panel-default col-md-4 col-md-offset-4">
			<div class="panel-heading">
				<h3 class="panel-title">Demo - Iniciar como:</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<tbody>
						<tr>
							<td>Luis Jovel</td>
							<td>
								<form action="user_login.php" method="post" accept-charset="utf-8">
									<input type="hidden" name="idusuario" value="2">	
									<button type="submit" name="submit" class="btn btn-default">Entrar</button>
								</form>
							</td>
						</tr>
						<tr>
							<td>Moises Montano</td>
							<td>
								<form action="user_login.php" method="post" accept-charset="utf-8">
									<input type="hidden" name="idusuario" value="1">	
									<button type="submit" name="submit" class="btn btn-default">Entrar</button>
								</form>
							</td>
						</tr>
					</tbody>
				</table>	
			</div>
		</div>
	</section>
<?php include 'include/footer.php'; ?>