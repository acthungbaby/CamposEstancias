<?php

// load config file first
require_once('includes/config.php');

// load basic functions next so that everything after can use them
require_once('includes/functions.php');

// load core objects
require_once('includes/database.php');

// load database-related classes
require_once('includes/propiedades.php');


// Trae la noticia
$propiedades = Propiedades::find_by_id($_GET['id']);


require('class.phpmailer.php');

if (isset($_POST['enviar'])) {
    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
	$mail->IsHTML(true);
	$mail->From = "no-reply@camposyestancias.com.py";
	$mail->FromName = "Campos y Estancias Sitio Web";
	$mail->Subject = "Campos y Estancias - Nuevo mensaje desde la web";
	$mail->AddAddress("info@camposyestancias.com.py", "Campos y Estancias");

	$cuerpo = '<p>Ref.Num: '.$_POST['alf_num'].'</p>';
	$cuerpo .= '<p>Nombre: '.$_POST['nombre'].'</p>';
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
    <title>CAMPOS Y ESTANCIAS | Bienvenidos</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
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
	<h1>Propiedades</h1>
	<div class="clear"></div>
	<div id="izquierda" class="galeria">
		<!--<?php if(!empty($propiedades->foto1) || $propiedades->foto1 != ""): ?>
		<div class="imagen">
			<img src="images/propiedades/<?=$propiedades->foto1?>" class="normal" />
		</div>
		<?php endif; ?>-->
		<?php if(!empty($propiedades->foto1) || $propiedades->foto1 != ""): ?>
		<div class="imagen">
                    <a href="images/propiedades/<?=$propiedades->foto1?>"><img src="images/propiedades/<?=$propiedades->foto1?>" class="thumbs"/></a>
			<?php if(!empty($propiedades->foto2) || $propiedades->foto2 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto2?>"><img src="images/propiedades/<?=$propiedades->foto2?>" class="thumbs" /></a>
			<?php endif; ?>
			<?php if(!empty($propiedades->foto3) || $propiedades->foto3 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto3?>"><img src="images/propiedades/<?=$propiedades->foto3?>" class="thumbs last" /></a>
			<?php endif; ?>
			<?php if(!empty($propiedades->foto4) || $propiedades->foto4 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto4?>"><img src="images/propiedades/<?=$propiedades->foto4?>" class="thumbs " /></a>
			<?php endif; ?>
			<?php if(!empty($propiedades->foto5) || $propiedades->foto5 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto5?>"><img src="images/propiedades/<?=$propiedades->foto5?>" class="thumbs " /></a>
			<?php endif; ?>
			<?php if(!empty($propiedades->foto6) || $propiedades->foto6 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto6?>"><img src="images/propiedades/<?=$propiedades->foto6?>" class="thumbs last" /></a>
			<?php endif; ?>
			<?php if(!empty($propiedades->foto7) || $propiedades->foto7 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto7?>"><img src="images/propiedades/<?=$propiedades->foto7?>" class="thumbs " /></a>
			<?php endif; ?>
			<?php if(!empty($propiedades->foto8) || $propiedades->foto8 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto8?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto8?>" class="thumbs " /></a>
			<?php endif; ?>
			<?php if(!empty($propiedades->foto9) || $propiedades->foto9 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto9?>"><img style="position:relative; left: 4px;"src="images/propiedades/<?=$propiedades->foto9?>" class="thumbs last" /></a>
			<?php endif; ?>
                        <?php if(!empty($propiedades->foto10) || $propiedades->foto10 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto10?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto10?>" class="thumbs " /></a>
			<?php endif; ?>
                        <?php if(!empty($propiedades->foto11) || $propiedades->foto11 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto11?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto11?>" class="thumbs " /></a>
			<?php endif; ?>
                        <?php if(!empty($propiedades->foto12) || $propiedades->foto12 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto12?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto12?>" class="thumbs " /></a>
			<?php endif; ?>
                        <?php if(!empty($propiedades->foto13) || $propiedades->foto13 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto13?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto13?>" class="thumbs " /></a>
			<?php endif; ?>
                        <?php if(!empty($propiedades->foto14) || $propiedades->foto14 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto14?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto14?>" class="thumbs " /></a>
			<?php endif; ?>
                        <?php if(!empty($propiedades->foto15) || $propiedades->foto15 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto15?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto15?>" class="thumbs " /></a>
			<?php endif; ?>
                        <?php if(!empty($propiedades->foto16) || $propiedades->foto16 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto16?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto16?>" class="thumbs " /></a>
			<?php endif; ?>
                        <?php if(!empty($propiedades->foto17) || $propiedades->foto17 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto17?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto17?>" class="thumbs " /></a>
			<?php endif; ?>
                        <?php if(!empty($propiedades->foto18) || $propiedades->foto18 != ""): ?>
			<a href="images/propiedades/<?=$propiedades->foto18?>"><img style="position:relative; left: 2px;" src="images/propiedades/<?=$propiedades->foto18?>" class="thumbs " /></a>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<div id="video">
		<?php
			$youtubeid = youtube_id_from_url($propiedades->video);
			if($youtubeid != ""):
		?>
			<iframe width="300" height="169" src="http://www.youtube.com/embed/<?=$youtubeid?>" frameborder="0" allowfullscreen></iframe>
		<?php endif; ?>
		</div>
                <?php if(isset($_GET['bymap'])){?>
                <p><a href="propiedades.php">Volver</a></p>
                <?php }else{ ?>
		<p><a href="propiedades-lista.php?operacion=<?php echo $_GET['operacion']?>&tipo-propiedad=<?php echo $_GET['tipo-propiedad']?>&departamento=<?php echo $_GET['departamento']?>&unidad_medida=<?php echo $_GET['unidad_medida']?>">Volver</a></p>
                <?php } ?>
        </div>
	<div id="derecha" class="propiedades">
		<div class="izquierda">
			<h2>Referencia: <?=$propiedades->ref_alf?> <?=$propiedades->ref_num?></h2>
			<p><strong>Superficie:</strong> <?=number_format($propiedades->superficie, 0, '', '.')?> <?php if($propiedades->unidad_medida == 0): echo "Has"; else: echo "m2"; endif;?></p>
			<!--<p><strong>Precio Un.:</strong> <?=number_format($propiedades->precio_un, 0, '', '.')?> <?php if($propiedades->moneda == "1"): echo "Gs."; else: echo "USD."; endif;?> p/ <?php if($propiedades->unidad_medida == 0): echo "Ha"; else: echo "m2"; endif;?></p>
                        <p><strong>Precio:</strong> <?=number_format($propiedades->precio, 0, '', '.')?>  <?php if($propiedades->moneda == "1"): echo "Gs."; else: echo "USD."; endif;?></p>-->
                        <p><strong>Departamento:</strong> <?php 
                            $id=$propiedades->departamento;
                            $id=$id+1;
                            //$sql= "SELECT departamento_nombre FROM departamentos where departamento_id =".$id;
                            $departamento = Departamentos::find_by_id($id);
                            echo $departamento->departamento_nombre;
                         ?></p>
                        <p><strong>Distrito:</strong> <?php echo $propiedades->distrito; ?></p></p>
		</div>
		<div class="derecha">
		</div>
		<hr />
		<p><strong>Descripción:</strong><br /><?=$propiedades->descripcion?></p>
                <?php if($propiedades->observacion!=""){?><p><strong>Observación:</strong><br /><?=$propiedades->observacion?></p><?php } ?>
		<p><strong>Enviar un e-mail de consulta o interés.</strong></p>
		<form action="propiedades-ver.php?id=<?=$_GET['id']?>" method="post" id="form-contact">
		<input type="hidden" id="alf_num" name="alf_num" value="<?php echo $propiedades->ref_alf.$propiedades->ref_num; ?>" /></p>
		<p>Nombre <a>*</a><br />
		<input type="text" id="nombre" name="nombre" class="txt required" /></p>
		<p>E-mail <a>*</a><br />
		<input type="text" id="email" name="email" class="txt required email" /></p>
		<p>Teléfono <a>*</a><br />
		<input type="text" id="telefono" name="telefono" class="txt required" /></p>
		<p>Consulta <a>*</a><br />
		<textarea type="text" id="mensaje" name="mensaje" class="txt"></textarea></p>
		<p><input type="submit" name="enviar" value="Enviar" class="btn"></p>
		</form>
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
    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    
        <script>
        $(document).ready(function(){
          $('.galeria a').fancybox();
        });
        </script>

    <!--<script type="text/javascript">
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
    
    	$('.thumbs').click(function(event){
        	event.preventDefault();
	        $('.normal').attr('src',this.src);
        });
    </script>-->
    <script>
        $(document).ready(function(){
          $("#form-contact").validate();
        });
    </script>

</body>
</html>