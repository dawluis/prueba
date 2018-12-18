<?php 

function capitales($nombrePais,$capital,$habitantes="muchos"){
    
    
   $frase="La capital de $nombrePais es $capital y tiene $habitantes habitantes<br>";
    
    return $frase;
    
    
}

echo capitales("España","Madrid");
echo capitales("Portugal","Lisboa");
echo capitales("Francia", "Paris", 6000000);







?>