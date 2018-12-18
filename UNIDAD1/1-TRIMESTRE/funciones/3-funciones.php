<?php

function sinEspacios($cadena){
    $trimmed=trim($cadena);
    $cadena= preg_replace('/ +/',' ',$trimmed);
    
    return $cadena;
}


?>