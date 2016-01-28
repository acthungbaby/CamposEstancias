<?php $_GET['id'] = 1; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Guía Ganadera | Bienvenidos</title>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />





<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAzPU3OScjQWnIDr7tKyZQRxQDfxPYmZX_kFyhJt9gvuhfNJTJcxQfIv5-Hd161oYuMGazf8yNXWTZ-w" type="text/javascript"></script>

<script type="text/javascript">
function initialize() {
	var map = new GMap2(document.getElementById("mapa"));
	map.setMapType(G_HYBRID_MAP);
	map.setCenter(new GLatLng(-23.5, -58.5), 7);
	
	// Add 10 markers to the map at random locations
	var bounds = map.getBounds();
	var southWest = bounds.getSouthWest();
	var northEast = bounds.getNorthEast();
	var lngSpan = northEast.lng() - southWest.lng();
	var latSpan = northEast.lat() - southWest.lat();
	
	function createMarker(point)
	{
	var marker = new GMarker(point);
	GEvent.addListener(marker, "click", function() {
		var myHtml = '<strong>La Paraguaya</strong><br />La Paraguaya, se dedica a la cría de …………………………..hace más de  dos décadas, seleccionando permanentemente por habilidad materna, capacidad reproductiva y adaptabilidad al medio.<br /><br /><a href="cabana.php?id=<?=$_GET['id']?>">Ver animales</a><br /><br />';
		map.openInfoWindowHtml(point, myHtml, { 'maxWidth' : 200 });
	});
	return marker;
	}
	
	var point = new GLatLng(-23.5, -58.5);
	map.addOverlay(createMarker(point));
	
	var point = new GLatLng(-24.8, -58.5);
	map.addOverlay(createMarker(point));
	
	var point = new GLatLng(-25, -56.5);
	map.addOverlay(createMarker(point));
	
	var point = new GLatLng(-23, -56.3);
	map.addOverlay(createMarker(point));
	
	var point = new GLatLng(-23, -55.8);
	map.addOverlay(createMarker(point));
	
	var point = new GLatLng(-21.5, -59.5);
	map.addOverlay(createMarker(point));
	
	var point = new GLatLng(-20.5, -61.5);
	map.addOverlay(createMarker(point));
	
	var point = new GLatLng(-20.9, -58.5);
	map.addOverlay(createMarker(point));
	
	var point = new GLatLng(-26, -56);
	map.addOverlay(createMarker(point));
	
	var point = new GLatLng(-27, -55.7);
	map.addOverlay(createMarker(point));
	
	map.addControl(new GLargeMapControl());
}
</script>

</head>
<body onload="initialize()">

<div id="contenedor">
	
	
	<div id="contenido">
		
		
		<div id="principal">
			
			<h3>Haciendo click en los puntos que aparecen en el mapa, puede ver más detalles.</h3>
			
			<div id="mapa">
				<!-- Acá va el mapa de Google -->
			</div>
			
		</div>
		
		<div class="clear"></div>
		
	</div>
	
</div>


</body>
</html>