<?php

$fecha="4-2-2018";

function compruebaFecha($fecha){
    
    $trozosFecha=explode("-", $fecha);
    
    $day=$trozosFecha[0];
    $month=$trozosFecha[1];
    $year= $trozosFecha[2];
    
    $fechaValida= checkdate($month, $day, $year);
    
    if($fechaValida){
        return $trozosFecha;
        
    }else{
        return false;
   
    }
    
}

if(is_array($fecha)){
    echo "LA FECHA ES VALIDA";
}else{
    
    echo "fecha no asdasdasddvalida";
}
?>