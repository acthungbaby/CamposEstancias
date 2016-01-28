<?php
require('class.phpmailer.php');

if (isset($_POST['enviar'])) {
    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
	$mail->IsHTML(true);
	$mail->From = "no-reply@camposyestancias.com.py";
	$mail->FromName = "Campos y Estancias Sitio Web";
	$mail->Subject = "Campos y Estancias - Nuevo mensaje desde la web";
	$mail->AddAddress("info@camposyestancias.com.py", "Campos y Estancias");

	$cuerpo = '<p>Nombre: '.$_POST['nombre'].'</p>';
	$cuerpo .= '<p>E-mail: '.$_POST['email'].'</p>';
	$cuerpo .= '<p>Telefono: '.$_POST['telefono'].'</p>';
	$cuerpo .= '<p>Mensaje: '.$_POST['mensaje'].'</p>';
	
	$mail->Body = $cuerpo;
	
	$mail->Send();
	
	echo "<script>alert('El mensaje ha sido enviado.!');</script>";

}
?>
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
	<a name="contacto"></a>
	<h1>Contacto</h1>
        
        
	<div id="izquierda">
                <span class="formhelp">Cualquier consulta o comentario, no dude en comunicarse con nosotros.</span>
		<form action="contacto.php" method="post" id="form-contact">
		<p>Nombre <span id="nombreInfo">*</span><br />
		<input type="text" id="nombre" name="nombre" class="txt required" /></p>
                
		<p>E-mail <span id="emailInfo">*</span><br />
		<input type="text" id="email" name="email" class="txt required email" /></p>

		<p>Teléfono <span id="telefonoInfo">*</span><br />
		<input type="text" id="telefono" name="telefono" class="txt required" /></p>
                
		<p>Mensaje <span id="mensajeInfo">*</span><br />
		<textarea type="text" id="mensaje" name="mensaje" class="txt required"></textarea></p>
		<p><input type="submit" name="enviar" value="Enviar" class="btn"></p>
		</form>
	</div>
	<div id="derecha" class='positionup'>
		<div id="datos">
			<img src="images/logo2.png" /><br /><br />
                        <p><a href="mailto:info@camposyestancias.com.py" class='owner'>info@camposyestancias.com.py</a><br /><br /><hr>
                        <a href="mailto:guido@camposyestancias.com.py" class="owner">Guido Kunzle 0981225119&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;guido@camposyestancias.com.py</a><br /><br /><br /><hr>
			<a href="mailto:fernando@camposyestancias.com.py"class="owner">Fernando Lombardo 0983203999&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fernando@camposyestancias.com.py</a></p>
		</div>
		
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
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="localization/messages_es.js"></script>
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
    
  <script>
        $(document).ready(function(){
          $("#form-contact").validate()
        });
  </script>

</body>
</html>