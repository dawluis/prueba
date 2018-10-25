<?php
function sinTildes($cadena){
    $cadena= preg_replace('/á/','a', $cadena);
    $cadena= preg_replace('/é/','e', $cadena);
    $cadena= preg_replace('/í/','i', $cadena);
    $cadena= preg_replace('/ó/','o', $cadena);
    $cadena= preg_replace('/ú/','u', $cadena);
    return $cadena;
}

function sinEspacios($cadena){
    $trimmed=trim($cadena);
    $cadena= preg_replace('/ +/',' ',$trimmed);
    
    return $cadena;
}

function compCaseEsp($cadena1,$cadena2){
    
    $cadena1=sinEspacios($cadena1);
    $cadena2=sinEspacios($cadena2);
    
    $tildesMayus=['á','é','í','ó','ú','Á','É','Í','Ó','Ú'];
    $sinTilde=['a','e','i','o','u','a','e','i','o','u'];
    
    for($i=0; $i < 10 ; $i++){
        $cadena1= str_replace($tildesMayus[$i],$sinTilde[$i],$cadena1);
        $cadena2= str_replace($tildesMayus[$i],$sinTilde[$i],$cadena2);
    }
    $cadena1= mb_strtolower($cadena1);
    $cadena2= mb_strtolower($cadena2);
    
    return strcmp($cadena1, $cadena2);
}







?>