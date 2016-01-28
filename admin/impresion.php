<link rel="stylesheet" type="text/css" href="../css/grid.css"/>


<?php

    // verifica si está logueado
    require('inc.seguridad.php');

    // load config file first
    require_once('../includes/config.php');
    
    require_once('../includes/class.eyemysqladap.inc.php');
    require_once('../includes/class.eyedatagrid.inc.php');    
    
    // Load the database adapter
    $db = new EyeMySQLAdap(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Load the datagrid class
    $x = new EyeDataGrid($db);

    $x->setQuery("ref_alf, ref_num, departamento, distrito, lugar, campo_urbano, propietario, descripcion, breve, superficie, unidad_medida, moneda, precio_un, precio, alquiler_venta, intermediario, observacion, sin_uso","propiedades, departamentos","", "propiedades.departamento = departamentos.departamento_id");


    // Print the table
    $x->printTable();

    //}
?>
