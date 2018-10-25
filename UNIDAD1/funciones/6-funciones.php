<?php
//Realiza una función negrita que reciba como parámetro un texto y lo devuelva en negrita.

function negrita($texto){
    $textoNegrita="<b>".$texto."</b>";
    return $textoNegrita;
}


echo negrita("QUE PASA LOCO ESTO ES LA COSA NEGRA");



?>