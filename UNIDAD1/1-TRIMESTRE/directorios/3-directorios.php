<?php

include'Bdirectorios.php';
$carpeta="fotos";
$arrayFotos=devuelveDirSubDir($carpeta);
$contador=0;
$arrayTotal=recorreArrayMultiDimensional($arrayFotos);
$contador1=0;
$bool=true;
$cont=0;
foreach($arrayFotos as $indice){
    if(is_array($indice)){
        echo "<table border=1px>";
        echo "<tr>";
        foreach($indice as $dato){
            if($contador == 2){
                echo "</tr>";
                echo "<tr>";
                $contador=0;
            }
            echo "<td><img src='$dato'"." style='width:150px' ></td>";
            $contador++;
        }
        echo "</tr>";
        echo "</table>";
        echo "<br>";
   
    }else{
        if($bool){
            echo "<table border=1px>";
            echo "<tr>";
            $bool=false;
        }
        if($contador == 2){
            echo "</tr>";
            echo "<tr>";
            $contador=0;
        }
            echo "<td><img src='$indice'"." style='width:150px'></td>";
            $contador++;
            
            if($cont == count($arrayFotos)){
                echo "</tr>";
                echo "</table>";
                echo "<br>";
            }
            
            
    }
    
   $cont++;
}
    
?>
