<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8" />
    <title>CAMPOS Y ESTANCIAS | Bienvenidos</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>
<body>
<div id="cabecera">
	<nav id="menu">
		<li id="navInicio"><a href="inicio.php?#inicio" class="activo"></a></li>
		<li id="navServicio"><a href="servicios.php?#servicios"></a></li>
		<li id="navPropiedades"><a href="propiedades.php?#propiedades"></a></li>
		<li id="navIndex"><a href="index.php"></a></li>
		<li id="navStaff"><a href="staff.php?#staff"></a></li>
		<li id="navContacto"><a href="contacto.php?#contacto"></a></li>
	</nav>
</div>
<div class="clear"></div>

<div id="contenedor">
	<a name="servicios"></a>
	<h1>Servicios</h1>
	<div id="izquierda" class="barra">
		<h2><img src="images/icono-administracion.png" /> Administración</h2>
		<p>Ofrecemos un servicio de asesoramiento de compras y ventas de propiedades, desarrollos y administracion de establecimientos pecuarios</p>
	</div>
	<div id="derecha">
		<h2><img src="images/icono-gestion.png" /> Gestión y Consultoría</h2>
		<p>Ofrecemos tasaciones, gestoria de documentos legales (due diligent) </p>
	</div>
	<hr />
	<div id="izquierda" class="barra">
		<h2><img src="images/icono-reportes.png" /> Reportes</h2>
		<p>Ofrecemos Analisis de suelos, proyeccion e implementacion de proyectos de forestacion y reforestacion, proyeccion de ganaderia y agricultura, geo referenciamiento</p>
	</div>
	<div id="derecha">
		<h2><img src="images/icono-vacunacion.png" /> Vacunación</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis scelerisque turpis eu orci fringilla tincidunt. Cras ut cursus urna. Sed vehicula dignissim leo, a dapibus ipsum semper non. Fusce sagittis felis id lectus porttitor tempor. Mauris augue magna, ornare quis tempus non, varius eu arcu. Proin id risus ut diam suscipit sodales.</p>
	</div>
	

</div>


<div id="footer">
	<a href="#" id="facebook"></a>
	<div class="clear"></div>
	<p>© 2012 Campos y Estancias Paraguay</p>
</div>



    <script type="text/javascript" src="js/jquery-1.7.1.min.js" ></script>
    <!--[if IE]>
    <script type="text/javascript" src="js/modernizr.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/global.js" ></script>
    <script type="text/javascript">
    function slideSwitch(divId)
    {
    	var $active = $(divId + ' img.active');
    	
    	if ( $active.length == 0 ) $active = $(divId + ' img:last');
    	
    	var $next =  $active.next('img').length ? $active.next('img')
    		: $(divId + ' img:first');
    	
    	$active.addClass('last-active');
    	
    	$next.css({opacity: 0.0})
    		.addClass('active')
    		.animate({opacity: 1.0}, 1000, function() {
    			$active.removeClass('active last-active');
    		});
    }
    
    /* Hacemos correr los slideshows */
    $(function()
    {
    	setInterval( "slideSwitch('#slideshow')", 5000 );
    });
    </script>

</body>
</html>