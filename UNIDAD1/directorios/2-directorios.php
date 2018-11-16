<?php
include'Bdirectorios.php';
$carpeta="fotos";
$arrayFotos=devuelveDirSubDir($carpeta);
$contador=0;
$arrayTotal=recorreArrayMultiDimensional($arrayFotos);
echo "<table border=1px>";
echo "<tr>";
foreach($arrayTotal as $index){
    
    if($contador == 2){
        echo "</tr>";
        echo "<tr>";
        $contador=0;
    }
    
    echo "<td><img src='$index'"." style='width:150px' ></td>";
    
    $contador++;
}
echo "</tr>";
echo "</table>";

?>