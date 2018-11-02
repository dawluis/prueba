<?php

$fecha="4-2-2018";

function compruebaFecha($fecha){
    
    $trozosFecha=explode("-", $fecha);
    
    $day=$trozosFecha[0];
    $month=$trozosFecha[1];
    $year= $trozosFecha[2];
    
    $fechaValida= checkdate($month, $day, $year);
    
    if($fechaValida){
        return "LA FECHA ES VALIDA Y EN FORMATO UNIX ES: ".mktime(0,0,0, $month, $day, $year);
    }else{
        return "fecha no valida";
    }
    
}

echo compruebaFecha($fecha);




?>