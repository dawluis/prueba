<?php

$lenguajes= array(
    "Servidor"=> array("uno"=>"PHP","dos"=>"PERL","tres"=>"JSP","cuatro"=>"ASP.NET"),
    "Cliente"=> array("uno"=>"JAVASCRIPT","dos"=>"JQUERY","tres"=>"HTML","cuatro"=>"CSS") 
);

foreach($lenguajes as $index => $valor){
    echo "INDICE : $index ";
    foreach($valor as $datos=> $dato){
        echo " PARTE : $datos : $dato ;"; 
    }
    echo "<br>";
}
?>