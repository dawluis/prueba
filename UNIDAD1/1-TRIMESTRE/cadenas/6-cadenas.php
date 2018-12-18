<?php
$frase="hola esto es una frase";
$array=explode(" ", $frase);
$contador=0;
echo"la frase es : $frase<br>";
foreach($array as $valor){
    
    echo "$contador ==> $valor<br>"; 
    
    $contador++;
}
?>