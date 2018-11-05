
<?php
/*Realiza una función que acepte una fecha como cadena c
 * on el formato aaaa-mm-dd compruebe si la fecha es correcta
 *  y nos devuelva la fecha en formato UNIX.*/



$fecha="2018-2-22";

function compruebaFecha2($fecha){
    
    $trozosFecha=explode("-", $fecha);
    
    $day=$trozosFecha[2];
    $month=$trozosFecha[1];
    $year= $trozosFecha[0];
    
    $fechaValida= checkdate($month, $day, $year);
    
    if($fechaValida){
        return "LA FECHA ES VALIDA Y EN FORMATO UNIX ES: ".mktime(0,0,0, $month, $day, $year);
    }else{
        return "fecha no valida";
    }
    
}

echo compruebaFecha2($fecha);





?>