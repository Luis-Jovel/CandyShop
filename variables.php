<?php
	$port = isset($_SERVER['SERVER_PORT'])?":".$_SERVER['SERVER_PORT']:"";
	$base_url="http://".$_SERVER['SERVER_NAME'].$port.dirname($_SERVER["REQUEST_URI"].'?');

	$language = array(
		"spanish" => array(
			//vista header
			"label_todo" => "Todo",
			"label_detalles" => "Detalles",
			"label_buscar" => "Buscar",
			"label_catalogo" => "Catálogo",
			"label_productos" => "Productos",
			"label_bienvenido" => "Bienvenido",
			"label_invitado" => "Invitado",
			"label_cerrar_sesion" => "Cerrar Sesión",
			"label_iniciar_sesion" => "Iniciar Sesión",
			"label_crea_tu_paquete" => "Crea tu paquete",
			//vista detalles
			"label_precio" => "Precio",
			"label_añadir_al_carrito_de_compras" => "Añadir al carrito",
			"label_productos_similares" => "Productos similares",
			//vista carritocompras
			"label_cantidad" => "Cantidad",
			"label_eliminar" => "Eliminar",
			"label_comprar" => "Comprar",
			"label_ver_catalogo" => "Ver Catálogo",
			"label_iniciar_sesion_para_comprar" => "Iniciar Sesión Para comprar",
			//vista footer
			"label_redes_sociales" => "Redes Sociales",
			"label_newsletter_registrate" => "Registrate en nuesta newletter te enviaremos novedades sobre nuestros productos y ofertas",
			"label_email" => "Email",
			"label_Enviar" => "Enviar",
			"label_enlaces" => "Enlaces",
			"label_acerca_de" => "Acerca de",
			"label_politicas_de_privacidad" => "Políticas de privacidad",
			"label_terminos_y_condiciones" => "Términos y condiciones",
			"label_contactanos" => "Contáctanos",
			"label_preguntas_frecuentes" => "Preguntas Frecuentes",
			"label_todos_los_derechos_reservados" => "Todos los derechos reservados",
			//vista vistos recientemente
			"label_vistos_recientemente" => "Vistos recientemente",
			//vista recomendados para ti
			"label_recomendados_para_ti" => "Recomendados para ti",
			// otros
			"label_no_hay_productos_a_mostrar" => "No hay productos a mostrar",
			//creador de paquetes
			"label_tu_fiesta_es" => "Tu fiesta es: ",
			"label_infantil" => "Infantil",
			"label_tradicional" => "Tradicional",
			"label_cantidad_de_adultos" => "Cantidad de adultos",
			"label_cantidad_de_personas" => "Cantidad de invitados",
			"label_cantidad_de_ninos" => "Cantidad de ni&ntilde;os",
			"label_cantidad_de_ninas" => "Cantidad de ni&ntilde;as",
			"label_pastel" => "Pastel",
			"label_pinata" => "Pi&ntilde;ata",
			"label_animador" => "Animador"
			),
		"english" => array(
			//vista header
			"label_todo" => "All",
			"label_detalles" => "See Details",
			"label_buscar" => "Search",
			"label_catalogo" => "Catalog",
			"label_productos" => "Products",
			"label_bienvenido" => "Welcome",
			"label_invitado" => "Guest",
			"label_cerrar_sesion" => "Logout",
			"label_iniciar_sesion" => "Login",
			"label_crea_tu_paquete" => "Package Builder",
			//vista detalles
			"label_precio" => "Price",
			"label_añadir_al_carrito_de_compras" => "Add to Cart",
			"label_productos_similares" => "Similar products",
			//vista carritocompras
			"label_cantidad" => "Quantity",
			"label_eliminar" => "Delete",
			"label_comprar" => "Proceed to checkout",
			"label_ver_catalogo" => "Return to Catalog",
			"label_iniciar_sesion_para_comprar" => "You must login to buy",
			//vista footer
			"label_redes_sociales" => "Social Networks",
			"label_newsletter_registrate" => "Register to our newsletter so we can send you news about our products and deals",
			"label_email" => "Email",
			"label_Enviar" => "Submit",
			"label_enlaces" => "Links",
			"label_acerca_de" => "About",
			"label_politicas_de_privacidad" => "Privacy policy",
			"label_terminos_y_condiciones" => "Terms and conditions",
			"label_contactanos" => "Contact Us",
			"label_preguntas_frecuentes" => "FAQ",
			"label_todos_los_derechos_reservados" => "All rights reserved",
			//vista vistos recientemente
			"label_vistos_recientemente" => "Recently viewed",
			"label_recomendados_para_ti" => "Recommended for you",
			// otros
			"label_no_hay_productos_a_mostrar" => "No products found",
			//creador de paquetes
			"label_tu_fiesta_es" => "Your party is: ",
			"label_infantil" => "For childs",
			"label_tradicional" => "Traditional",
			"label_cantidad_de_adultos" => "Number of adults",
			"label_cantidad_de_personas" => "Number of guests",
			"label_cantidad_de_ninos" => "Number of boys",
			"label_cantidad_de_ninas" => "Number of girls",
			"label_pastel" => "Add Cake",
			"label_pinata" => "Add Pi&ntilde;ata",
			"label_animador" => "Add animator"
			)
		);
?>