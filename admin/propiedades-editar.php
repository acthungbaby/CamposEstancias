<?php

// verifica si está logueado
require('inc.seguridad.php');

// load config file first
require_once('../includes/config.php');

// load basic functions next so that everything after can use them
require_once('../includes/functions.php');

// load core objects
require_once('../includes/database.php');

// load database-related classes
require_once('../includes/propiedades.php');

// Tamaño máximo de la foto
$max_file_size = 2097152;	// expressed in bytes
							//     10240 =  10 KB
							//    102400 = 100 KB
							//   1048576 =   1 MB
							//  10485760 =  10 MB

// Trae la noticia
$propiedades = Propiedades::find_by_id($_GET['id']);


// Si envío el formulario, guardamos
if(isset($_POST['enviar_nuevo']))
{
	
	$latitud = DMStoDEC(intval($_POST['la_grados']),intval($_POST['la_minutos']),intval($_POST['la_segundos']));
	$longitud = DMStoDEC(intval($_POST['lo_grados']),intval($_POST['lo_minutos']),intval($_POST['lo_segundos'])); 

	$propiedades->ref_alf 					= $_POST['ref_alf'];
	$propiedades->ref_num 					= $_POST['ref_num'];
	$propiedades->region 					= $_POST['region'];
	$propiedades->departamento 				= $_POST['departamento'];
	$propiedades->distrito 					= $_POST['distrito'];
	$propiedades->lugar 					= $_POST['lugar'];
	$propiedades->campo_urbano 				= $_POST['campo_urbano'];
	$propiedades->propietario 				= $_POST['propietario'];
	$propiedades->sin_uso 					= $_POST['sin_uso'];
	$propiedades->descripcion 				= $_POST['descripcion'];
	$propiedades->breve 					= $_POST['breve'];
	$propiedades->sin_uso2 					= $_POST['sin_uso2'];
	$propiedades->superficie 				= $_POST['superficie'];
	$propiedades->unidad_medida 			= $_POST['unidad_medida'];
	$propiedades->moneda		 			= $_POST['moneda'];
	$propiedades->precio_un 				= $_POST['precio_un'];
	$propiedades->precio 					= $_POST['precio'];
	$propiedades->sin_uso3 					= $_POST['sin_uso3'];
	$propiedades->latitud 					= $latitud;
	$propiedades->longitud 					= $longitud;
	$propiedades->alquiler_venta			= $_POST['alquiler_venta'];
	$propiedades->sin_uso4 					= $_POST['sin_uso4'];
	$propiedades->intermediario 			= $_POST['intermediario'];
	$propiedades->observacion 				= $_POST['observacion'];
	$propiedades->video		 				= $_POST['video'];
        $propiedades->habilitado                                = $_POST['habilitado'];



	if($propiedades->save())
	{
		// Guarda la foto
		if(isset($_FILES['foto1']) && !empty($_FILES['foto1'])){
			$propiedades->attach_file($_FILES['foto1'],"foto1");
		}
		if(isset($_FILES['foto2']) && !empty($_FILES['foto2'])){
			$propiedades->attach_file($_FILES['foto2'],"foto2");
		}
		if(isset($_FILES['foto3']) && !empty($_FILES['foto3'])){
			$propiedades->attach_file($_FILES['foto3'],"foto3");
		}
		if(isset($_FILES['foto4']) && !empty($_FILES['foto4'])){
			$propiedades->attach_file($_FILES['foto4'],"foto4");
		}
		if(isset($_FILES['foto5']) && !empty($_FILES['foto5'])){
			$propiedades->attach_file($_FILES['foto5'],"foto5");
		}
		if(isset($_FILES['foto6']) && !empty($_FILES['foto6'])){
			$propiedades->attach_file($_FILES['foto6'],"foto6");
		}
		if(isset($_FILES['foto7']) && !empty($_FILES['foto7'])){
			$propiedades->attach_file($_FILES['foto7'],"foto7");
		}
		if(isset($_FILES['foto8']) && !empty($_FILES['foto8'])){
			$propiedades->attach_file($_FILES['foto8'],"foto8");
		}
		if(isset($_FILES['foto9']) && !empty($_FILES['foto9'])){
			$propiedades->attach_file($_FILES['foto9'],"foto9");
		}
                
                if(isset($_FILES['foto10']) && !empty($_FILES['foto10'])){
			$propiedades->attach_file($_FILES['foto10'],"foto10");
		}
                
                if(isset($_FILES['foto11']) && !empty($_FILES['foto11'])){
			$propiedades->attach_file($_FILES['foto11'],"foto11");
		}
                
                if(isset($_FILES['foto12']) && !empty($_FILES['foto12'])){
			$propiedades->attach_file($_FILES['foto12'],"foto12");
		}
                
                if(isset($_FILES['foto13']) && !empty($_FILES['foto13'])){
			$propiedades->attach_file($_FILES['foto13'],"foto13");
		}
                
                if(isset($_FILES['foto14']) && !empty($_FILES['foto14'])){
			$propiedades->attach_file($_FILES['foto14'],"foto14");
		}
                
                if(isset($_FILES['foto15']) && !empty($_FILES['foto15'])){
			$propiedades->attach_file($_FILES['foto15'],"foto15");
		}
                
                if(isset($_FILES['foto16']) && !empty($_FILES['foto16'])){
			$propiedades->attach_file($_FILES['foto16'],"foto16");
		}
                
                if(isset($_FILES['foto17']) && !empty($_FILES['foto17'])){
			$propiedades->attach_file($_FILES['foto17'],"foto17");
		}
                
                if(isset($_FILES['foto18']) && !empty($_FILES['foto18'])){
			$propiedades->attach_file($_FILES['foto18'],"foto18");
		}
		// Success
		header("Location: propiedades.php");
		exit;
	}
	else
	{
		// Failure
		$error = join("<br />", $propiedades->errors);
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Campos y Estancias » Administración</title>
<link href="css/tm_admin.css" rel="stylesheet" type="text/css" />


</head>

<body class="admin-noticias">

<?php require('inc.cabecera.php'); ?>

<div id="contenido">

	<div id="col_izq">
		<h3>Acciones:</h3>
		<ul>
			<li>» <a href="propiedades.php">Volver al listado de propiedades</a></li>
		</ul>
	</div>
	
	<div id="principal">
		
		<h1>Agregar una propiedad</h1>
		
		<?php
		if(isset($error)):
		?>
		
		<p class="error"><?php echo $error; ?></p>
		
		<?php
		endif;
		?>
		
		<form name="nuevo_producto" action="" method="post" enctype="multipart/form-data">
			
			<div id="contenedor_form">
                            
                                <label>Habilitado</label>
                                <br/>
                                <select name="habilitado" class="txt" style="width:98%;">
                                    <option value="1" <?php if($propiedades->habilitado == "1"): echo "selected='selected'"; endif; ?>>Habilitado</option>
                                    <option value="0" <?php if($propiedades->habilitado == "0"): echo "selected='selected'"; endif; ?>>Deshabilitado</option>        
				</select>
			
				<label>Ref. Alf.</label>
				<br />
				<input type="text" name="ref_alf" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->ref_alf?>" />
				
				<br /><br />
				<label>Ref. Num.</label>
				<br />
				<input type="text" name="ref_num" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->ref_num?>" />
				
				<br /><br />
				<label>Región</label>
				<br />
				<select name="region" class="txt" style="width:98%;">
					<option value="0" <?php if($propiedades->region == "0"): echo "selected='selected'"; endif;?>>Oriental</option>
					<option value="1" <?php if($propiedades->region == "1"): echo "selected='selected'"; endif;?>>Occidental</option>
				</select>
				
				<br /><br />
			
				<label>Departamento</label>
				<br />
				<select name="departamento" class="txt" style="width:98%;"><option value="0" <?php if($propiedades->departamento == "0"): echo "selected='selected'"; endif;?>>Alto Paraguay</option><option value="1" <?php if($propiedades->departamento == "1"): echo "selected='selected'"; endif;?>>Boqueron</option><option value="2" <?php if($propiedades->departamento == "2"): echo "selected='selected'"; endif;?>>Presidente Hayes</option><option value="3" <?php if($propiedades->departamento == "3"): echo "selected='selected'"; endif;?>>Alto Parana</option><option value="4" <?php if($propiedades->departamento == "4"): echo "selected='selected'"; endif;?>>Amambay</option><option value="5" <?php if($propiedades->departamento == "5"): echo "selected='selected'"; endif;?>>Asuncion</option><option value="6" <?php if($propiedades->departamento == "6"): echo "selected='selected'"; endif;?>>Caaguazu</option><option value="7" <?php if($propiedades->departamento == "7"): echo "selected='selected'"; endif;?>>Caazapa</option><option value="8" <?php if($propiedades->departamento == "8"): echo "selected='selected'"; endif;?>>Canindeyu</option><option value="9" <?php if($propiedades->departamento == "9"): echo "selected='selected'"; endif;?>>Central</option><option value="10" <?php if($propiedades->departamento == "10"): echo "selected='selected'"; endif;?>>Concepcion</option><option value="11" <?php if($propiedades->departamento == "11"): echo "selected='selected'"; endif;?>>Cordillera</option><option value="12" <?php if($propiedades->departamento == "12"): echo "selected='selected'"; endif;?>>Guaira</option><option value="13" <?php if($propiedades->departamento == "13"): echo "selected='selected'"; endif;?>>Itapua</option><option value="14" <?php if($propiedades->departamento == "14"): echo "selected='selected'"; endif;?>>Misiones</option><option value="15" <?php if($propiedades->departamento == "15"): echo "selected='selected'"; endif;?>>Neembucu</option><option value="16" <?php if($propiedades->departamento == "16"): echo "selected='selected'"; endif;?>>Paraguari</option><option value="17" <?php if($propiedades->departamento == "17"): echo "selected='selected'"; endif;?>>San Pedro</option></select>
				
				<br /><br />
				<label>Distrito</label>
				<br />
				<input type="text" name="distrito" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->distrito?>" />
				
				<br /><br />
				<label>Lugar</label>
				<br />
				<input type="text" name="lugar" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->lugar?>" />
				
				<br /><br />
				<label>Campo/Urbano</label>
				<br />
				<select class="txt" id="txt_peracion" name="campo_urbano">
					<option value="0" <?php if($propiedades->campo_urbano == 0): echo "selected='selected'"; endif;?>>Campo</option>
					<option value="1"  <?php if($propiedades->campo_urbano == 1): echo "selected='selected'"; endif;?>>Urbano</option>
				</select>
				
				<br /><br />
				<label>Propietario</label>
				<br />
				<input type="text" name="propietario" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->propietario?>" />
				
				<br /><br />
				
				<label>Sin Uso</label>
				<br />
				<input type="text" name="sin_uso" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->sin_uso?>" />
				
				<br /><br />

				<label>Descripcion</label>
				<br />
				<textarea name="descripcion" id="txt_titulo" class="txt" style="width: 98%;" rows="12"><?=$propiedades->descripcion?></textarea>
								
				<br /><br />
				
				<label>Breve descripcion</label>
				<br />
				<textarea name="breve" id="txt_titulo" class="txt" style="width: 98%;" rows="12"><?=$propiedades->breve?></textarea>
								
				<br /><br />
				
				<label>Sin Uso</label>
				<br />
				<input type="text" name="sin_uso2" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->sin_uso2?>" />
				
				<br /><br />
				

				<label>Superficie</label>
				<br />
				<input type="text" name="superficie" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->superficie?>" />
				
				<br /><br />
				

				<label>Unidad de Medida</label>
				<br />
				<select name="unidad_medida" class="txt" style="width:98%;">
					<option value="0" <?php if($propiedades->unidad_medida == 0): echo "selected='selected'"; endif;?>>Has</option>
					<option value="1" <?php if($propiedades->unidad_medida == 1): echo "selected='selected'"; endif;?>>m2</option>
				</select>
								
				<br /><br />
				
				<label>Moneda</label>
				<br />
				<select class="txt" id="txt_peracion" name="moneda">
					<option value="0" <?php if($propiedades->moneda == 0): echo "selected='selected'"; endif;?>>USD</option>
				</select>
				
				<br /><br />
				
				
				<label>Precio Unitario</label>
				<br />
				<input type="text" name="precio_un" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->precio_un?>" />
				
				<br /><br />
				

				<label>Precio</label>
				<br />
				<input type="text" name="precio" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->precio?>" />
				
				<br /><br />
				

				<label>Sin Uso</label>
				<br />
				<input type="text" name="sin_uso3" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->sin_uso3?>" />
				
				<br /><br />
				
				<?php
					$latitud = DECtoDMS($propiedades->latitud); 
				?>
				<label>Latitud</label>
				<br />
				<input type="text" name="la_grados" id="txt_titulo" class="txt" style="" value="<?=$latitud['deg']?>" placeholder="Grados" /><label>&deg;</label>
				<input type="text" name="la_minutos" id="txt_titulo" class="txt" style="" value="<?=$latitud['min']?>" placeholder="Minutos" /><label>'</label>
				<input type="text" name="la_segundos" id="txt_titulo" class="txt" style="" value="<?=$latitud['sec']?>" placeholder="Segundos" /><label>"</label>
				
				<br /><br />
				
				<?php
					$longitud = DECtoDMS($propiedades->longitud); 
				?>

				<label>Longitud</label>
				<br />
				<input type="text" name="lo_grados" id="txt_titulo" class="txt" style="" value="<?=$longitud['deg']?>" placeholder="Grados" /><label>&deg;</label>
				<input type="text" name="lo_minutos" id="txt_titulo" class="txt" style="" value="<?=$longitud['min']?>" placeholder="Minutos" /><label>'</label>
				<input type="text" name="lo_segundos" id="txt_titulo" class="txt" style="" value="<?=$longitud['sec']?>" placeholder="segundos" /><label>"</label>
				
				<br /><br />
				

				<label>Alquiler/Venta</label>
				<br />
				<select class="txt" id="txt_peracion" name="alquiler_venta">
					<option value="0" <?php if($propiedades->alquiler_venta == 0): echo "selected='selected'"; endif;?>>Alquiler</option>
					<option value="1" <?php if($propiedades->alquiler_venta == 1): echo "selected='selected'"; endif;?>>Venta</option>
				</select>
				
				
				<br /><br />

				<label>Sin Uso</label>
				<br />
				<input type="text" name="sin_uso4" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->sin_uso4?>" />
				
				<br /><br />

				<label>Intermediario</label>
				<br />
				<input type="text" name="intermediario" id="txt_titulo" class="txt" style="width: 98%;" value="<?=$propiedades->intermediario?>" />
				
				<br /><br />

				<label>Observación</label>
				<br />
				<textarea name="observacion" id="txt_texto" class="txt" rows="12" style="width: 98%;"><?=$propiedades->observacion?></textarea>
				
				<br /><br />

				
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto1?>" target="_blank"><?=$propiedades->foto1?></a></label>
				<br />
				<input type="file" name="foto1" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto2?>" target="_blank"><?=$propiedades->foto2?></a></label>
				<br />
				<input type="file" name="foto2" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto3?>" target="_blank"><?=$propiedades->foto3?></a></label>
				<br />
				<input type="file" name="foto3" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto4?>" target="_blank"><?=$propiedades->foto4?></a></label>
				<br />
				<input type="file" name="foto4" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto5?>" target="_blank"><?=$propiedades->foto5?></a></label>
				<br />
				<input type="file" name="foto5" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto6?>" target="_blank"><?=$propiedades->foto6?></a></label>
				<br />
				<input type="file" name="foto6" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>

				<label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto7?>" target="_blank"><?=$propiedades->foto7?></a></label>
				<br />
				<input type="file" name="foto7" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto8?>" target="_blank"><?=$propiedades->foto8?></a></label>
				<br />
				<input type="file" name="foto8" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto9?>" target="_blank"><?=$propiedades->foto9?></a></label>
				<br />
				<input type="file" name="foto9" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
                                
                                <label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto10?>" target="_blank"><?=$propiedades->foto10?></a></label>
				<br />
				<input type="file" name="foto10" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
                                
                                <label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto11?>" target="_blank"><?=$propiedades->foto11?></a></label>
				<br />
				<input type="file" name="foto11" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
                                
                                <label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto12?>" target="_blank"><?=$propiedades->foto12?></a></label>
				<br />
				<input type="file" name="foto12" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
                                
                                <label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto13?>" target="_blank"><?=$propiedades->foto13?></a></label>
				<br />
				<input type="file" name="foto13" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
                                
                                <label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto14?>" target="_blank"><?=$propiedades->foto14?></a></label>
				<br />
				<input type="file" name="foto14" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
                                
                                <label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto15?>" target="_blank"><?=$propiedades->foto15?></a></label>
				<br />
				<input type="file" name="foto15" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
                                
                                <label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto16?>" target="_blank"><?=$propiedades->foto16?></a></label>
				<br />
				<input type="file" name="foto16" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
                                
                                <label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto17?>" target="_blank"><?=$propiedades->foto17?></a></label>
				<br />
				<input type="file" name="foto17" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
                                
                                <label>Foto (Tamaño máximo del archivo: 2Mb.) <a href="../images/propiedades/<?=$propiedades->foto18?>" target="_blank"><?=$propiedades->foto18?></a></label>
				<br />
				<input type="file" name="foto18" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Video (Ej.: http://www.youtube.com/watch?v=4RL6uCFHE-U)</label>
				<br />
				<input type="text" name="video" id="txt_foto" class="txt" size="50" value="<?=$propiedades->video?>" />							
				
				<br /><br/>
				
				
				<p class="btn_guardar">
					<input name="enviar_nuevo" type="submit" value="Guardar Propiedad" class="btn" /> o <a href="propiedades.php">Cancelar</a>
				</p>
				
			</div>
			
		</form>
		
	</div>
	
	<div class="clear"></div>
	
</div>
</body>
</html>