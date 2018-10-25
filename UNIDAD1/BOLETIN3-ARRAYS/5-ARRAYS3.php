<?php
$pila = array("cinco"=> 5, "uno"=>1, "cuatro"=>4, "dos"=>2, "tres"=>3);
asort($pila);
foreach($pila as $index => $valor){
    
    echo " $index : $valor "; 
}
echo "<br> EL ASORT ORDENA UN ARRAY Y MANTIENE LA ASOCIACION DE LOS INDICES <br>";
echo"---------------------------------------------------------------------------------------<br>";
$pila = array("cinco"=> 5, "uno"=>1, "cuatro"=>4, "dos"=>2, "tres"=>3);

arsort($pila);

foreach($pila as $index => $valor){
    
    echo " $index : $valor ";
}
echo "<br> EL ARSORT Ordena un array en orden inverso y mantiene la asociación de índices <br>";
echo"---------------------------------------------------------------------------------------<br>";
$pila = array("cinco"=> 5, "uno"=>1, "cuatro"=>4, "dos"=>2, "tres"=>3);

ksort($pila);

foreach($pila as $index => $valor){
    
    echo " $index : $valor ";
    
}
echo "<br> EL KSORT Ordena un array por clave <br>";
echo"---------------------------------------------------------------------------------------<br>";
$pila = array("cinco"=> 5, "uno"=>1, "cuatro"=>4, "dos"=>2, "tres"=>3);

sort($pila);

foreach($pila as $index => $valor){
    
    echo " $index : $valor ";
    
}
echo "<br> EL SORT Ordena un array de menor a mayor sin tener en cuenta el numero de indice <br>";
echo"---------------------------------------------------------------------------------------<br>";
$pila = array("cinco"=> 5, "uno"=>1, "cuatro"=>4, "dos"=>2, "tres"=>3);

rsort($pila);

foreach($pila as $index => $valor){
    
    echo " $index : $valor ";
    
}
echo "<br> EL RSORT Ordena un array en orden inverso sin tener en cuenta el numero de indice <br>";

?>