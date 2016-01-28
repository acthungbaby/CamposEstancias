<?php

// load config file first
require_once('includes/config.php');

// load basic functions next so that everything after can use them
require_once('includes/functions.php');

// load core objects
require_once('includes/database.php');
require_once('includes/pagination.php');

// load database-related classes
require_once('includes/propiedades.php');

?>
<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8" />
    <meta name=”keywords” content=”campos, estancias, campos y estancias, paraguay, vacuno, tasacion de terrenos, pecuarios, analisis de suelos, impacto ambiental, forestacion y reforestacion, ganaderia, agricultura, agricola, ventas, inmobiliaria, terrenos” />
    <title>CAMPOS Y ESTANCIAS | Bienvenidos</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyDln25GzcO4TpStpBHD3MD3YrCV9lIDwGI" type="text/javascript"></script>

	<script type="text/javascript">
	function initialize() {
		var map = new GMap2(document.getElementById("mapa"));
		map.setMapType(G_HYBRID_MAP);
		map.setCenter(new GLatLng(-23.5, -58.5), 6);
                
                // Create our "tiny" marker icon
                var blueIcon = new GIcon(G_DEFAULT_ICON);
                blueIcon.image = "images/fondo/corral.png";

                // Set up our GMarkerOptions object
                markerOptions = { icon:blueIcon };

		
		// Add 10 markers to the map at random locations
		var bounds = map.getBounds();
		var southWest = bounds.getSouthWest();
		var northEast = bounds.getNorthEast();
		var lngSpan = northEast.lng() - southWest.lng();
		var latSpan = northEast.lat() - southWest.lat();
		

		function createMarker(point,breve,id)
		{
                    
		
                var marker = new GMarker(point,markerOptions);
		GEvent.addListener(marker, "click", function() {
			var myHtml = breve+" <a href='propiedades-ver.php?id="+id+"'>Ver propiedad</a>";
			map.openInfoWindowHtml(point, myHtml, { 'maxWidth' : 200 });
		});
		return marker;
		}
		
		<?php 
		
		$sql = "SELECT * FROM propiedades ORDER BY id DESC ";
		$propiedades = Propiedades::find_by_sql($sql);
		
		?>
		<?php foreach($propiedades as $propiedad): ?>
		var point = new GLatLng(-(<?=$propiedad->latitud?>), -(<?=$propiedad->longitud?>));
		var breve = "<?php echo $propiedad->breve; ?>";
		var id = "<?php echo $propiedad->id; ?>&bymap=1";

		map.addOverlay(createMarker(point,breve,id));
		<?php endforeach; ?>
	
		
		map.addControl(new GLargeMapControl());
	}
	
	</script>
  </head>
<body onload="initialize()">
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
	<a name="propiedades"></a>
	<h1>Propiedades</h1>
	<div class="clear"></div>
	<form action="propiedades-lista.php" enctype="get">
	<div id="izquierda" class="propiedades">
		<h2>Busqueda segun Criterios</h2>
		<p><strong>Operación:</strong><br /><br />
                    <span class="radio"><input type="radio" name="operacion" value="1" checked="checked"> Venta</span>    
                    <span class="radio"><input type="radio" name="operacion" value="0"> Alquiler</span>
		</p>
		
		<p><strong>Tipo de Propiedad:</strong><br /><br />
		<span class="radio"><input type="radio" name="tipo-propiedad" value="0" checked="checked">Campos</span>
		<span class="radio"><input type="radio" name="tipo-propiedad" value="1">Urbano</span></p>
		
		<p><strong>Región:</strong><br /><br />
		<span class="select">
			<select name="region" class="region">
				<option value="0" selected="selected">Todo</option>
				<option value="1">Oriental</option>
				<option value="2">Occidental</option>
			</select>
		</span></p>
		
		<p><strong>Departamento:</strong><br /><br />
		<select id="departamento" class="departamento" name="departamento">
			<option value="">Todos</option><option value="0">Alto Paraguay</option><option value="1">Boqueron</option><option value="2">Presidente Hayes</option><option value="3">Alto Parana</option><option value="4">Amambay</option><option value="5">Asuncion</option><option value="6">Caaguazu</option><option value="7">Caazapa</option><option value="8">Canindeyu</option><option value="9">Central</option><option value="10">Concepcion</option><option value="11">Cordillera</option><option value="12">Guaira</option><option value="13">Itapua</option><option value="14">Misiones</option><option value="15">Neembucu</option><option value="16">Paraguari</option><option value="17">San Pedro</option>
		</select></p>
		
		<p><strong>Unidad de Medida:</strong><br /><br />
		<span class="select">
			<select name="unidad_medida" class="unidad_medida">
				<option value="0" selected="selected">Hectareas</option>
				<option value="1">M2</option>
			</select>
		</span></p>
		<p><strong>Superficie:</strong><br /><br />
                <input type="text" name="superficiemin" placeholder="Desde.." class="txt2"></p>
		<p><input type="text" name="superficiemax" placeholder="Hasta.." class="txt2"></p>
		<p><strong>Precio:</strong><br /><br />
                <input type="text" name="montomin" placeholder="Desde.." class="txt2"></p>
		<p><input type="text" name="montomax" placeholder="Hasta.." class="txt2"></p>
		
		<p><input type="submit" name="buscar" value="Buscar" class="btn"></p>

	</div>
	<div id="derecha" class="propiedades">
		<h2>Busqueda directa</h2>
		<div id="mapa">
			
		</div>
	</div>
	</form>

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
    
    $('.region').change(function() {
	    if(this.value == 1){
		    $('.departamento').replaceWith('<select id="departamento" class="departamento" name="departamento"><option value="3">Alto Parana</option><option value="4">Amambay</option><option value="5">Asuncion</option><option value="6">Caaguazu</option><option value="7">Caazapa</option><option value="8">Canindeyu</option><option value="9">Central</option><option value="10">Concepcion</option><option value="11">Cordillera</option><option value="12">Guaira</option><option value="13">Itapua</option><option value="14">Misiones</option><option value="15">Neembucu</option><option value="16">Paraguari</option><option value="17">San Pedro</option></select>');
	    }else if(this.value == 2){
		    $('.departamento').replaceWith('<select id="departamento" class="departamento" name="departamento"><option value="0">Alto Paraguay</option><option value="1">Boqueron</option><option value="2">Presidente Hayes</option></select>');
	    }else if(this.value == 0){
		    $('.departamento').replaceWith('<select id="departamento" class="departamento" name="departamento"><option value="">Todos</option><option value="0">Alto Paraguay</option><option value="1">Boqueron</option><option value="2">Presidente Hayes</option><option value="3">Alto Parana</option><option value="4">Amambay</option><option value="5">Asuncion</option><option value="6">Caaguazu</option><option value="7">Caazapa</option><option value="8">Canindeyu</option><option value="9">Central</option><option value="10">Concepcion</option><option value="11">Cordillera</option><option value="12">Guaira</option><option value="13">Itapua</option><option value="14">Misiones</option><option value="15">Neembucu</option><option value="16">Paraguari</option><option value="17">San Pedro</option></select>');
	    }
	});

    </script>

</body>
</html>