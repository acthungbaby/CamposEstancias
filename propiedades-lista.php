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
require_once('includes/departamentos.php');



?>
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
	<h1>Propiedades</h1>
	<div class="clear"></div>
	<h2>Resultados</h2>
		<?php 
		$filtros = "";
		
		if($_GET['operacion'] != "") {
			$filtros .= " WHERE alquiler_venta = '".$_GET['operacion']."'";
		}
		
		if($_GET['tipo-propiedad'] != "") {
			if($filtros != "") {
				$filtros .= " AND";
			} else {
				$filtros .= " WHERE";
			}
			$filtros .= " campo_urbano = '".$_GET['tipo-propiedad']."'";
		}

		if($_GET['departamento'] != "") {
			if($filtros != "") {
				$filtros .= " AND";
			} else {
				$filtros .= " WHERE";
			}
			$filtros .= " departamento = '".$_GET['departamento']."'";
		}

		if($_GET['unidad_medida'] != "") {
			if($filtros != "") {
				$filtros .= " AND";
			} else {
				$filtros .= " WHERE";
			}
			$filtros .= " unidad_medida = '".$_GET['unidad_medida']."'";
		}

		/*if($_GET['superficie'] != "") {
			if($filtros != "") {
				$filtros .= " AND";
			} else {
				$filtros .= " WHERE";
			}
			$filtros .= " superficie <= '".$_GET['superficie']."'";
		}*/
                
                if($_GET['superficiemin']==''){
                    $supmin=0;
                }else{
                    $supmin=$_GET['superficiemin'];
                }
                
                if($_GET['superficiemax']==''){
                    $supmax=99999999999999999999999999;
                }else{
                    $supmax=$_GET['superficiemax'];
                }
                
                if($filtros != "") {
                    $filtros .= " AND";
                } else {
                    $filtros .= " WHERE";
		}
                    
                $filtros .= " superficie BETWEEN ".$supmin." AND ".$supmax;
                
                
                if($_GET['montomin']==''){
                    $monmin=0;
                }else{
                    $monmin=$_GET['montomin'];
                }
                
                if($_GET['montomax']==''){
                    
                    $monmax=99999999999999999999999999;
                }else{
                    $monmax=$_GET['montomax'];
                }
                
                if($filtros != "") {
                    $filtros .= " AND";
                } else {
                    $filtros .= " WHERE";
		}
                    
                $filtros .= " precio BETWEEN ".$monmin." AND ".$monmax;
                        
                

		/*if($_GET['monto'] != "") {
			if($filtros != "") {
				$filtros .= " AND";
			} else {
				$filtros .= " WHERE";
			}
			$filtros .= " precio <= '".$_GET['monto']."'";
		}*/
                
		$sql = "SELECT * FROM propiedades".$filtros." AND habilitado = 1 ORDER BY id DESC ";

		$propiedades = Propiedades::find_by_sql($sql);
                
                
		
		?>
	<?php foreach($propiedades as $propiedad): ?>	
	<div class="propiedades">
		<h4>Referecia: <?=$propiedad->ref_alf?> <?=$propiedad->ref_num?></h4>
		<div class="imagen">
			<img src="images/propiedades/<?php echo $propiedad->foto1; ?>" />	
		</div>
		<div class="detalles">
			<p><strong>Departamento:</strong> <?php 
                            $id=$propiedad->departamento;
                            $id=$id+1;
                            //$sql= "SELECT departamento_nombre FROM departamentos where departamento_id =".$id;
                            $departamento = Departamentos::find_by_id($id);
                            echo $departamento->departamento_nombre;
                         ?></p>
			<p><strong>Distrito:</strong> <?php echo $propiedad->distrito; ?></p>
                        <p><strong>Superficie:</strong> <?php echo number_format($propiedad->superficie,0,'','.'); ?></p>
                        <!--<p><strong>Precio:</strong> <?php echo number_format($propiedad->precio,0,'','.'); ?></p>-->
			<p><a href="propiedades-ver.php?id=<?php echo $propiedad->id; ?>&operacion=<?php echo $_GET['operacion']?>&tipo-propiedad=<?php echo $_GET['tipo-propiedad']?>&departamento=<?php echo $_GET['departamento']?>&unidad_medida=<?php echo $_GET['unidad_medida']?>">Más detalles</a></p>
		</div>
		<div class="detalles">
			<p><strong>Descripción:</strong> <?php echo $propiedad->breve; ?></p>
			
		</div>
	</div>
	<?php endforeach; ?>
	<p><a href="propiedades.php" class='vuelta'>Volver</a></p>

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