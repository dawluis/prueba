<?php


function compruebaFecha($fecha){
    
    $trozosFecha=preg_split('/[\/-]/', $fecha);
    
    $day=$trozosFecha[0];
    $month=$trozosFecha[1];
    $year= $trozosFecha[2];
    
    $fechaValida= checkdate($month, $day, $year);
    
    if($fechaValida){
        return $trozosFecha;
        //"LA FECHA ES VALIDA Y EN FORMATO UNIX ES: ".mktime(0,0,0, $month, $day, $year);
    }else{
        return false;
    }
    
}





?>