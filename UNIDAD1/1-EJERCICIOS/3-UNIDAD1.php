<?php

define("radio", 63781);

define("distancia", 150000000);

define("PI", 3,14);


$circunferencia= 2*PI*radio;

$vueltas= distancia/$circunferencia;
$vueltasInt= round($vueltas);

echo "ESTA ES LA DISTANCIA DE UNA VUELTA AL MUNDO: $circunferencia <br>";
echo "ESTAS SON LAS VULETAS QUE DARIAMOS AL MUNDO CON LA DISTANCIA DEL SOL: $vueltasInt";

?>