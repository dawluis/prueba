<?php
/*
$tiempoUnix=time();

$fecha=date("d-m-Y", $tiempoUnix);

$trozosFecha=preg_split('/[\/-]/', $fecha);

$vuelveUnix=mktime(0,0,0,$trozosFecha[1],$trozosFecha[0],$trozosFecha[2]);


echo checkdate($trozosFecha[1], $trozosFecha[0], $trozosFecha[2]);

echo date("d-m-Y",$vuelveUnix);
*/







$fecha="22-2-10";

$trozos=preg_split('/[\/-]/', $fecha);

if(checkdate($trozos[1], $trozos[0], $trozos[2])){
    
    $tiempoUnix=mktime(0,0,0,$trozos[1],$trozos[0],$trozos[2]);
    
}
echo "$tiempoUnix<br>";


$fecha1=date("d-m-Y", $tiempoUnix);


echo "$fecha1<br>";









?>