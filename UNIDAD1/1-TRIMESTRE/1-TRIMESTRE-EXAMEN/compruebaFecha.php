<?php
function compruebaFecha($fecha){
    //PARTIMOS LA FECHA EN 3 TROZOS Y LA METEMOS EN UN ARRAY
    $trozosfecha=preg_split('/[\/-]/', $fecha);
    
    //COMPROBAMOS QUE SEAN VALIDAS CON LOS FORMATOS INDICADOS EN EL EXAMEN
    if(checkdate($trozosfecha[0], $trozosfecha[1], $trozosfecha[2])){
        
        return mktime(0,0,0,$trozosfecha[1],$trozosfecha[0],$trozosfecha[2]);
    
    }else if(checkdate($trozosfecha[1], $trozosfecha[0], $trozosfecha[2])){
        
        return mktime(0,0,0,$trozosfecha[1],$trozosfecha[0],$trozosfecha[2]);
    
    }else if(checkdate($trozosfecha[2], $trozosfecha[1], $trozosfecha[0])){
        
        return mktime(0,0,0,$trozosfecha[1],$trozosfecha[0],$trozosfecha[2]);
    // SI EL FORMATO DE FECHA NO ES VALIDO NOS DEVOLVERA FALSE
    }else{
        return false;
    }
    
}



echo compruebaFecha("1-2012-2");// AQUI TENEMOS UNA OPCION POR LA CUAL NOS DEVOLVERA FALSE

echo compruebaFecha("1-2-2012");//AQUI TENEMOS UNA OPCION POR LA CUAL NOS DEVOLVERA LA FECHA EN UNIX


?>