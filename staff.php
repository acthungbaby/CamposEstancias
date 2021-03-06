<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8" />
    <meta name=”keywords” content=”campos, estancias, campos y estancias, paraguay, vacuno, tasacion de terrenos, pecuarios, analisis de suelos, impacto ambiental, forestacion y reforestacion, ganaderia, agricultura, agricola, ventas, inmobiliaria, terrenos” />
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
	<a name="staff"></a>
	<h1>Staff</h1>
	<div id="izquierda" class="barra">
		<h2>Guido René Künzle Fois</h2>
                <h3>Zootecnista, especializado en producci&oacute;n ganadera</h3>
		<p>Asunci&oacute;n</p>
                <p><a href="mailto:guido@camposyestancias.com.py">guido@camposyestancias.com.py</a></p>
        </div>
		<div id="derecha">
		<h2>Fernando Javier Lombardo Bernal</h2>
		<h3>Lic. MBA en contabilidad y administración de empresas</h3>
		<p>Ciudad del Este</p>
		<p><a href="mailto:fernando@camposyestancias.com.py">fernando@camposyestancias.com.py</a></p>
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