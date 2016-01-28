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

// Elimina la noticia
$propiedad = Propiedades::find_by_id($_GET['id']);

if($propiedad)
{
	$propiedad->delete();
}

header("Location: propiedades.php");

?>