<?php
/*Realiza una función que nos devuelva el nº de días que han pasado entre dos fechas.
Hay que tener en cuenta que tendremos que validar las fechas antes o durante la
función.*/
include '1-fechas.php';
function diffFechas($fecha1, $fecha2){
    
    if((compruebaFecha($fecha1)==false)||(compruebaFecha($fecha2)==false)){
        
        return false;
    }else{
        $trozosfehas1=compruebaFecha($fecha1);
        $trozosfehas2=compruebaFecha($fecha2);
        $tiempoUnix1= mktime(0,0,0,$trozosfehas1[1],$trozosfehas1[0],$trozosfehas1[2]);
        $tiempoUnix2= mktime(0,0,0,$trozosfehas2[1],$trozosfehas2[0],$trozosfehas2[2]);
        
        if($tiempoUnix1 > $tiempoUnix2){
            
            $resultadoTiempoUnix=$tiempoUnix1-$tiempoUnix2;
        
        }else if($tiempoUnix2 > $tiempoUnix1){
            
            $resultadoTiempoUnix=$tiempoUnix2-$tiempoUnix1;
            
        }
        
        $diffAños=floor($resultadoTiempoUnix / (365 * 24 * 60 * 60));
        $diffDias=floor($resultadoTiempoUnix / (24 * 60 * 60));
        
        return "Diferencia entre las dos fechas en años es: $diffAños  años y en dias es : $diffDias dias y en segundos es: $resultadoTiempoUnix";
    } 
    
}










?>