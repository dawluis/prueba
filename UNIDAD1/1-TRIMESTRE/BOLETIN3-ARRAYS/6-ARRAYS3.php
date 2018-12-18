<?php

$europa= array(
    "España"=>"Madrid",
    "Suiza"=>"Luxenburgo",
    "Francia"=>"Paris",
    "Italia"=>"Roma",
    "Alemania"=>"Frankfurt" 
);

foreach($europa as $pais=> $capital){
    echo "La capital de $pais es $capital <br>";
}
echo"-----------------------ASORT----NOS ORDENA LOS DATOS DEL ARRAY MANTENIENDO LOS INDICES-------------<br>";
asort($europa);
foreach($europa as $pais=> $capital){
    echo "La capital de $pais es $capital <br>";
}

echo"-----------------------KSORT-----NOS ORDENA LOS INDICES DEL ARRAY MANTENIENDO LOS DATOS------------<br>";
ksort($europa);
foreach($europa as $pais=> $capital){
    echo "La capital de $pais es $capital <br>";
}






?>