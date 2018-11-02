<?php
/*
Realiza una función que nos devuelva el nº de días que han pasado entre dos fechas.
Hay que tener en cuenta que tendremos que validar las fechas antes o durante la
función.*/

include '1-fechas.php';

function diferFechas($fecha1, $fecha2){
    
    if(is_array(compruebaFecha($fecha1)) && is_array(compruebaFecha($fecha2))){
     //fecha1   
        $trozosFecha1=explode("-", $fecha1);
        
        $day=$trozosFecha1[0];
        $month=$trozosFecha1[1];
        $year= $trozosFecha1[2];
       
     //fecha2
        $trozosFecha2=explode("-", $fecha2);
        
        $day2=$trozosFecha2[0];
        $month2=$trozosFecha2[1];
        $year2= $trozosFecha2[2];
        
         
        $tiempoFecha1= mktime(0,0,0,$month,$day,$year);
        
        $tiempoFecha2= mktime(0,0,0,$month2,$day2,$year2);
        
        
        $resultadoUnix;
     
    
    }else{
        
        return "Las fechas intorducidas no son validas";
        
    }
    
    
    
    
}







?>