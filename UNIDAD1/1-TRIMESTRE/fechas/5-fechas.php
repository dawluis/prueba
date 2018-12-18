<?php
include '1-fechas.php';
function estacionImagen ($fecha){  
    if(compruebaFecha($fecha)==false){
        return "fecha incorrecta";
    }else{
        $trozosFecha=compruebaFecha($fecha);
        $mes=$trozosFecha[1];
        switch($mes){
            
            case 2; case 1; case 12;
            return "<img src='img/invierno.jpg'>";
            break;
            case 3; case 4; case 5;
            return "<img src='img/primavera.jpg'>";
            break;
            case 6; case 7; case 8;
            return "<img src='img/verano.jpg'>";
            break;
            case 9; case 10; case 11;
            return "<img src='img/otono.jpg'>";
            break;
        
        }
        
        
        
    }
    
    
}

?>