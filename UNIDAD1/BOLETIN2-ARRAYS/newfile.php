<?php
$pepe= array("melon"=>"sandia","melon"=>"canarias");

$arraymulti= array(
    "pepe"=>array("nombre"=>"ivan"),
    "juan"=>array("nombre"=>"jose"),
    "luis"=>array("nombre"=>"samuel"),
);
 
foreach($arraymulti as $index => $valor){
    echo "USUARIO: $index";
    foreach($valor as $datos => $dato){
        echo " DATO: $datos VALOR:$dato";
        echo "<br>";
    }
}
?>