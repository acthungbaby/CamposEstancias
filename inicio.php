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
	<a name="inicio"></a>
	<h1>Inicio</h1>
	<h2>Bienvenido a Campos y Estancias Paraguay</h2>
	<div id="izquierda">
		<p>Campos y Estancias Paraguay es una empresa que nace con experiencia en la búsqueda, negociación, compra, venta y administración de propiedades inmobiliarias orientadas a la producción primaria tanto de granos cuanto de energías renovables y proteínas de origen animal.</p>
		<p>Presentamos a nuestros clientes alternativas de negocios adaptados al perfil y la necesidad de cada uno de ellos teniendo como premisa de trabajo la calidad total, seriedad, honestidad, eficiencia en el servicio y la mejor rentabilidad en las inversiones que proponemos a nuestros clientes.</p>
	</div>
	<div id="derecha">
		<p>Nos esforzamos por proveer la mayor cantidad de información exacta para facilitar la toma de decisiones.</p>
		<p>Bienvenido a nuestra página web, estamos a su disposición para ayudarlo en su negocio inmobiliario.</p>
	</div>
	<hr />
	<h2>Paraguay</h2>
	<div id="izquierda">
		<p>Es un país que conjuga tierras fértiles, calor, agua en abundancia, energía hidroeléctrica, eólica, fósil y renovable, con una estabilidad macro económica, un gobierno democrático, población escasa, de costumbres tradicionales y amabilidad innata, rodeado de naturaleza exuberante, que hacen de este un paraíso para vivir y hacer inversiones inmobiliarias.</p>
		<p><strong>Ubicación Geográfica:</strong> Situado en el corazón de América del Sur es un país mediterráneo comprendido entre los paralelos 19º 18´ y 27º 36´ de latitud sur, y los meridianos 59º 19´ y 62º 38´ de longitud oeste-, limita al norte con Brasil y Bolivia, al este con Brasil y Argentina, al sur con Argentina y al oeste con Argentina y Bolivia</p>
                <p><strong>Clima:</strong> Tropical a subtropical. Temperatura promedio: 25º a 35º en verano y 10º a 20º en invierno.</p>
                <p><strong>Huso horario:</strong> GMT-4.</p>
                <p><strong>Población Actual:</strong> 6.068.000 habitantes.</p>
                <p><strong>Idiomas oficiales:</strong> Español y Guaraní.</p>
		<p><strong>Moneda:</strong> Guaraní, se aceptan además  dólares americanos.</p>
                <p><strong>Tasa de Embarque en Aeropuerto:</strong> 31 dólares americanos.</p>
		<p><strong>Agua para tomar:</strong> El agua corriente es potable.</p>
		<p><strong>Electricidad:</strong> 220 voltios y 50 ciclos.</p>
                <p><strong>Religión:</strong> Libertad de culto garantizada constitucionalmente. Religión predominante: católica, Apostólica, Romana.</p>
                <p><strong>Gobierno:</strong> República. Democracia representativa. Poder Ejecutivo (sistema presidencialista). Poder Legislativo Bicameral (Cámara de Senadores y Cámara de Diputados). Poder Judicial.</p>
                <p><strong>Principales Actividades Economicas:</strong> Producción de granos, carne, energía eléctrica y comercio.</p>
                <p><strong>Regiones geográficas:</strong> El Rio Paraguay corta el país de norte a sur, dividiéndolo en dos regiones. Al este del Rio se encuentra la región oriental, que cuenta con mayor densidad poblacional y desarrollo de infraestructura y al oeste se encuentra la llanura occidental o Chaco que forma parte del pantanal Matogrosense Brasilero.</p>
                <p><strong>División geopolítica:</strong> El país está dividido en 18 departamentos de extensiones y características variables, distribuidos entre la región Oriental y la Occidental. </p>
                              
        </div>  
	<div id="derecha">
		<img src="images/mapa-paraguay.png" />
		<div class="clear"></div>
		<img src="images/fotos-paraguay.png" />
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