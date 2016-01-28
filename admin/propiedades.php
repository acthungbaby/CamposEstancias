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
			<li>» <a href="propiedades-nuevo.php">Agregar una propiedad</a></li>
		</ul>
	</div>
	
	<div id="principal">
		
		<h1>Propiedades</h1>
		
		
		
		
		
		<?php 
		
		// 1. the current page number ($current_page)
		$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
		
		// 2. records per page ($per_page)
		$per_page = 10;
		
		// 3. total record count ($total_count)
		$total_count = Propiedades::count_all();
		
		$pagination = new Pagination($page, $per_page, $total_count);
		
		// Instead of finding all records, just find the records 
		// for this page
		

			$sql = "SELECT * FROM propiedades ORDER BY id DESC ";
			$sql .= "LIMIT {$per_page} ";
			$sql .= "OFFSET {$pagination->offset()}";
		
		
		$propiedades = Propiedades::find_by_sql($sql);
		
		?>
		
		<table id="productos-listado" cellspacing="1" cellpadding="0" width="100%">
			
			<tr>
				
				<th align="center" valign="middle" width="20%">Departamento</th>
				
				<th align="center" valign="middle" width="30%">Descripción</th>
				
				<th align="center" valign="middle" width="40%">Precio</th>
                                
                                <th align="center" valign="middle" width="40%">Fecha Ingreso</th>
				
				<th align="center" colspan="2" valign="middle" width="10%">Acciones</th>
				
			</tr>
			
			<?php foreach($propiedades as $propiedad): ?>
			
			<tr>
				
				<td align="left" valign="top">
					<?php if($propiedad->departamento == 0):?>
						Alto Paraguay
					<?php elseif($propiedad->departamento == 1):?>
						Boqueron
					<?php elseif($propiedad->departamento == 2):?>
						Presidente Hayes
					<?php elseif($propiedad->departamento == 3):?>
						Alto Parana
					<?php elseif($propiedad->departamento == 4):?>
						Amambay
					<?php elseif($propiedad->departamento == 5):?>
						Asuncion
					<?php elseif($propiedad->departamento == 6):?>
						Caaguazu
					<?php elseif($propiedad->departamento == 7):?>
						Caazapa
					<?php elseif($propiedad->departamento == 8):?>
						Canindeyu
					<?php elseif($propiedad->departamento == 9):?>
						Central
					<?php elseif($propiedad->departamento == 10):?>
						Concepcion
					<?php elseif($propiedad->departamento == 11):?>
						Cordillera
					<?php elseif($propiedad->departamento == 12):?>
						Guaira
					<?php elseif($propiedad->departamento == 13):?>
						Itapua
					<?php elseif($propiedad->departamento == 14):?>
						Misiones
					<?php elseif($propiedad->departamento == 15):?>
						Neembucu
					<?php elseif($propiedad->departamento == 16):?>
						Paraguari
					<?php elseif($propiedad->departamento == 17):?>
						San Pedro
					<?php endif;?>
				</td>
				
				<td align="left" valign="top"><?php echo $propiedad->breve; ?></td>
				
				<td align="left" valign="top"><?php echo $propiedad->precio ?></td>
                                
                                <td align="left" valign="top"><?php echo $propiedad->fecha ?></td>
				
				<td align="center"><a href="propiedades-editar.php?id=<?php echo $propiedad->id; ?>" title="Editar"><img src="gfx/btn_edit.gif" alt="Editar" /></a></td>
				
				<td align="center"><a href="propiedades-eliminar.php?id=<?php echo $propiedad->id; ?>" title="Eliminar"><img src="gfx/btn_cancel.gif" alt="Eliminar" /></a></td>
			</tr>
			
			<?php endforeach; ?>
			
		</table>
		
		
		<?php if($pagination->total_pages() > 1): ?>
		
		<div class="pagination">
		
			<?php
			
			/*
			if($pagination->has_previous_page())
			{
				echo "<a href=\"index.php?page=";
				echo $pagination->previous_page();
				echo "\">&laquo; Previous</a> "; 
			}
			*/
			
			for($i=1; $i <= $pagination->total_pages(); $i++):
				
				if($i == $page):
			
			?>
			
			<a href="propiedades.php?page=<?php echo $i; ?>" class="current"><?php echo $i; ?></a>
			
			<?php
				
				else:
			
			?>
			
			<a href="propiedades.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			
			<?php
					
				endif;
				
			endfor;
			
			/*
			if($pagination->has_next_page())
			{
				echo " <a href=\"index.php?page=";
				echo $pagination->next_page();
				echo "\">Next &raquo;</a> "; 
			}
			*/
			
			?>
			
			<div class="clear"></div>
			
		</div>
		
		<?php endif; ?>
		
	</div>
	
	<div class="clear"></div>
	
</div>

</body>
</html>