<?php
include'Bdirectorios.php';
$carpeta="fotos";
$arrayFotos=devuelveDir($carpeta);
$contador=0;
echo "<table border=1px>";
echo "<tr>";

foreach($arrayFotos as $index){
    
    if($contador == 2){
        echo "</tr>";
        echo "<tr>";
        $contador=0;
    }
    echo "<td><img src='$carpeta"."/"."$index'"." style='width:150px' ></td>";
    $contador++;
}
echo "</tr>";
echo "</table>";
?>