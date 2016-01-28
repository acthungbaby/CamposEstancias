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
	<div id="logo"><a href="index.php"></a></div>
</div>
<section id="slideshow">
    <img src="images/slideshow/fondo-1.jpg" class="active" />
    <img src="images/slideshow/fondo-2.jpg" />
    <img src="images/slideshow/fondo-3.jpg" />
    <img src="images/slideshow/fondo-4.jpg" />
    <img src="images/slideshow/fondo-5.jpg" />
</section>
<div id="footer">
	<a href="inicio.php?#inicio">Bienvenido</a>
	<a href="#">Welcome</a>
	<div class="clear"></div>
	<a href="#" id="facebook"></a>
	<div class="clear"></div>
	<p>© 2012 Campos y Estancias Paraguay</p>
</div>



    <script type="text/javascript" src="js/jquery-1.7.1.min.js" ></script>
	<script type="text/javascript" src="js/jquery.slideshow.js"></script>
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
    
	$(document).ready(function() {
		$('#slideshow').slideshow({
			timeout: 5000,
			fadetime: 1500
		});
	});
    </script>

</body>
</html>