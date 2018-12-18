<?php
/*Realiza una función que reciba la fecha en formato UNIX y devuelva la
 * fecha en formato dd-mm-aaaa y
 /*Realiza una función que reciba la fecha en formato UNIX y devuelva la
 * fecha en formato dd-mm-aaaa y
 * aaaa-mm-dd según un segundo argumento que le pasemos a la función.*/
$fechaUnix=time();
$tipo="aaaa-mm-dd";

function fechaNormal($fechaUnix,$tipoDeFecha){
    
    if($tipoDeFecha=="aaaa-mm-dd"){
        
        return $fechaEnFormato= date("Y-m-d", $fechaUnix);
        
        
        return $fechaEnFormato= date("Y-m-d", $fechaUnix);
        
    }else if($tipoDeFecha=="dd-mm-aaaa"){
        return $fechaEnFormato= date("d-m-Y", $fechaUnix);
    }
}

echo fechaNormal($fechaUnix,$tipo);


?>
