<?php

$dias= array("lunes", "martes", "miercoles","jueves", "viernes");

echo "CON EL FOR: <br>";
for($i=0; $i < count($dias); $i++){
    echo " EN EL INDICE $i SE ENCUENTRA EL VALOR $dias[$i] <br>"; 
}
echo "CON EL FOREACH: <br>";

foreach($dias as $indice => $valor ){
    
    echo "EN LA POSICION $indice SE ENCUENTRA EL VALOR $valor <br>";
    
}
?>