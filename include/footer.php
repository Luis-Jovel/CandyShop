<?php include "panel_visitados.php" ?>
</section>
<footer>
	<div class="row footer-top">
		<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
			<h3><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_redes_sociales']:$language['spanish']['label_redes_sociales']?></h3>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-facebook-official"></i></a>
			<a href="#"><i class="fa fa-youtube-square"></i></a>
		</div>
		<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
			<h3>NEWSLETTER</h3>
			<p><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_newsletter_registrate']:$language['spanish']['label_newsletter_registrate']?></p>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Email">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?"Send":"Enviar"?></button>
				</span>
			</div>
		</div>
		<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
			<h3><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_enlaces']:$language['spanish']['label_enlaces']?></h3>
			<ul class="footer-enlaces">
				<li>
					<a href="#"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_acerca_de']:$language['spanish']['label_acerca_de']?></a>
				</li>
				<li>
					<a href="#"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_politicas_de_privacidad']:$language['spanish']['label_politicas_de_privacidad']?></a>
				</li>
				<li>
					<a href="#"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_terminos_y_condiciones']:$language['spanish']['label_terminos_y_condiciones']?></a>
				</li>
				<li>
					<a href="#"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_contactanos']:$language['spanish']['label_contactanos']?></a>
				</li>
				<li>
					<a href="#"><?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_preguntas_frecuentes']:$language['spanish']['label_preguntas_frecuentes']?></a>
				</li>
			</ul>
		</div>
	</div>
	<div class="row footer-oscuro">
		<p class="footer-bottom">Copyright &copy; 2015 Candy Shop. <?=(isset($_SESSION['idioma']) && $_SESSION['idioma']=="EN")?$language['english']['label_todos_los_derechos_reservados']:$language['spanish']['label_todos_los_derechos_reservados']?></p>
	</div>
</footer>
</body>
</html>