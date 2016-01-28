<?php

// verifica si está logueado
require('inc.seguridad.php');

// load config file first
require_once('../includes/config.php');

// load basic functions next so that everything after can use them
require_once('../includes/functions.php');

// load core objects
require_once('../includes/database.php');
require_once('../includes/pagination.php');

// load database-related classes
require_once('../includes/propiedades.php');
require_once('../includes/regiones.php');

// Tamaño máximo de la foto
$max_file_size = 2097152;	// expressed in bytes
							//     10240 =  10 KB
							//    102400 = 100 KB
							//   1048576 =   1 MB
							//  10485760 =  10 MB

// Si envío el formulario, guardamos
if(isset($_POST['enviar_nuevo']))
{

	$latitud = DMStoDEC(intval($_POST['la_grados']),intval($_POST['la_minutos']),intval($_POST['la_segundos']));
	$longitud = DMStoDEC(intval($_POST['lo_grados']),intval($_POST['lo_minutos']),intval($_POST['lo_segundos'])); 

	$propiedades = new Propiedades();
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
	$propiedades->video 					= $_POST['video'];



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
			
				<label>Ref. Alf.</label>
				<br />
				<input type="text" name="ref_alf" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				<label>Ref. Num.</label>
				<br />
				<input type="text" name="ref_num" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				<label>Región</label>
                                
                                <?php 
		
                                   
                                    
                                    $per_page = 2;
                                    $offset=0;
                                    $sql = "SELECT * FROM regiones ORDER BY region_id DESC ";
                                    $sql .= "LIMIT {$per_page} ";
                                    $sql .= "OFFSET {$offset}";

                                    $regiones = regiones::find_by_sql($sql);




                                ?>
				<br />
				<select name="region" class="txt" style="width:98%;">
                                        <?php foreach($regiones as $region):?>
                                            <option value="<?php echo $region->region_id; ?>"><?php echo $region->region_nombre; ?></option>
                                        <?php endforeach; ?>
				</select>
				
				<br /><br />
			
				<label>Departamento</label>
				<br />
				<select name="departamento" class="txt" style="width:98%;"><option value="0">Alto Paraguay</option><option value="1">Boqueron</option><option value="2">Presidente Hayes</option><option value="3">Alto Parana</option><option value="4">Amambay</option><option value="5">Asuncion</option><option value="6">Caaguazu</option><option value="7">Caazapa</option><option value="8">Canindeyu</option><option value="9">Central</option><option value="10">Concepcion</option><option value="11">Cordillera</option><option value="12">Guaira</option><option value="13">Itapua</option><option value="14">Misiones</option><option value="15">Neembucu</option><option value="16">Paraguari</option><option value="17">San Pedro</option></select>
				
				<br /><br />
				<label>Distrito</label>
				<br />
				<input type="text" name="distrito" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				<label>Lugar</label>
				<br />
				<input type="text" name="lugar" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				<label>Campo/Urbano</label>
				<br />
				<select class="txt" id="txt_peracion" name="campo_urbano">
					<option value="0">Campo</option>
					<option value="1">Urbano</option>
				</select>
				
				<br /><br />
				<label>Propietario</label>
				<br />
				<input type="text" name="propietario" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				
				<label>Sin Uso</label>
				<br />
				<input type="text" name="sin_uso" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />

				<label>Descripcion</label>
				<br />
				<textarea name="descripcion" id="txt_titulo" class="txt" style="width: 98%;" rows="12"></textarea>
								
				<br /><br />
				
				<label>Breve Descripcion</label>
				<br />
				<textarea name="breve" id="txt_titulo" class="txt" style="width: 98%;" rows="12"></textarea>
								
				<br /><br />
				
				<label>Sin Uso</label>
				<br />
				<input type="text" name="sin_uso2" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				

				<label>Superficie</label>
				<br />
				<input type="text" name="superficie" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				

				<label>Unidad de Medida</label>
				<br />
				<select name="unidad_medida" class="txt" style="width:98%;">
					<option value="0">Has</option>
					<option value="1">m2</option>
				</select>
				
				<br /><br />
				
				
				<label>Moneda</label>
				<br />
				<select class="txt" id="txt_peracion" name="moneda">
					<option value="0" selected="selected">USD</option>
				</select>
				
				<br /><br />
				
				
				<label>Precio Unitario</label>
				<br />
				<input type="text" name="precio_un" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				

				<label>Precio</label>
				<br />
				<input type="text" name="precio" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				

				<label>Sin Uso</label>
				<br />
				<input type="text" name="sin_uso3" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />
				

				<label>Latitud</label>
				<br />
				<input type="text" name="la_grados" id="txt_titulo" class="txt" style="" value="" placeholder="Grados" /><label>&deg;</label>
				<input type="text" name="la_minutos" id="txt_titulo" class="txt" style="" value="" placeholder="Minutos" /><label>'</label>
				<input type="text" name="la_segundos" id="txt_titulo" class="txt" style="" value="" placeholder="Segundos" /><label>"</label>
				
				<br /><br />
				

				<label>Longitud</label>
				<br />
				<input type="text" name="lo_grados" id="txt_titulo" class="txt" style="" value="" placeholder="Grados" /><label>&deg;</label>
				<input type="text" name="lo_minutos" id="txt_titulo" class="txt" style="" value="" placeholder="Minutos" /><label>'</label>
				<input type="text" name="lo_segundos" id="txt_titulo" class="txt" style="" value="" placeholder="segundos" /><label>"</label>
				
				<br /><br />
				

				<label>Alquiler/Venta</label>
				<br />
				<select class="txt" id="txt_peracion" name="alquiler_venta">
					<option value="0">Alquiler</option>
					<option value="1">Venta</option>
				</select>
				
				
				<br /><br />

				<label>Sin Uso</label>
				<br />
				<input type="text" name="sin_uso4" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />

				<label>Intermediario</label>
				<br />
				<input type="text" name="intermediario" id="txt_titulo" class="txt" style="width: 98%;" value="" />
				
				<br /><br />

				<label>Observación</label>
				<br />
				<textarea name="observacion" id="txt_texto" class="txt" rows="12" style="width: 98%;"></textarea>
				
				<br /><br />

				
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.)</label>
				<br />
				<input type="file" name="foto1" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.)</label>
				<br />
				<input type="file" name="foto2" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.)</label>
				<br />
				<input type="file" name="foto3" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.)</label>
				<br />
				<input type="file" name="foto4" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.)</label>
				<br />
				<input type="file" name="foto5" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.)</label>
				<br />
				<input type="file" name="foto6" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.)</label>
				<br />
				<input type="file" name="foto7" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.)</label>
				<br />
				<input type="file" name="foto8" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Foto (Tamaño máximo del archivo: 2Mb.)</label>
				<br />
				<input type="file" name="foto9" id="txt_foto" class="txt" size="50" />							
				
				<br /><br/>
				
				<label>Video (Ej.: http://www.youtube.com/watch?v=4RL6uCFHE-U)</label>
				<br />
				<input type="text" name="video" id="txt_foto" class="txt" size="50" />							
				
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