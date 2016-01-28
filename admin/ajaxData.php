<?php
$region = $_GET['region'];
 

$regionxdepartamento = array(
            
            //0 => array('valor'=>0,'nombre'=>'Alto Paraguay'),array('valor'=>1,'nombre'=>'Boqueron'),array('valor'=>2,'nombre'=>'Pte. Hayes'),
            //1 => array('valor'=>0,'nombre'=>'Alto Paraguay'),array('valor'=>1,'nombre'=>'Boqueron'),array('valor'=>2,'nombre'=>'Pte. Hayes'),
            0 => array('Alto Paraguay','Boqueron','Pte. Hayes'),
            1 => array('Alto Parana','Amambay','Asuncion','Caaguazu','Caazapa','Canindeyu','Central','Concepcion','Cordillera','Guaira','Itapua','Misiones','&Ntilde;eembucu','Paraguari','San Pedro'),

        );

$departamentovalores = array(
            0 =>array(0,1,2),
            1=>array(3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)
);
    

$departamentos = $regionxdepartamento[$region];

$valores = $departamentovalores[$region];

$last=count($departamentos);

$i=0;

?>
<select name="departamento" class='txt' style="width:98%;">
    <?php
    while ($i < $last) {
        
        ?>
        <option value='<?php echo $valores[$i]?>'><?php echo $departamentos[$i]; ?></option>
        <?php
    $i++;}
    ?>
</select>



<?php 
    /*if($departamento == "Alto Paraguay"){echo "0";}elseif($departamento == "Boqueron"){echo "1";}elseif($departamento == "Pte. Hayes"){echo "2";}
    elseif($departamento == "Alto Parana"){echo "3";}elseif($departamento == "Amambay"){echo "4";}elseif($departamento == "Asuncion"){echo "5";}
    elseif($departamento == "Caaguazu"){echo "6";}elseif($departamento == "Canindeyu"){echo "7";}elseif($departamento == "Central"){echo "8";}
    elseif($departamento == "Concepcion"){echo "9";}elseif($departamento == "Cordillera"){echo "10";}elseif($departamento == "Guaira"){echo "11";}
    elseif($departamento == "Itapua"){echo "12";}elseif($departamento == "Misiones"){echo "13";}elseif($departamento == "&Ntilde;eembucu"){echo "14";}
    elseif($departamento == "Paraguari"){echo "15";}elseif($departamento == "San Pedro"){echo "15";}*/
?>


