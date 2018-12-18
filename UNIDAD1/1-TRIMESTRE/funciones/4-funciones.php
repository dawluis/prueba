<?php

include '3-funciones.php';

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


if(compCaseEsp("HOLA          Á", "holaA")==0){
    echo "SON IGUALES";
}else{
    echo "NO SON IGUALES";
}






?>