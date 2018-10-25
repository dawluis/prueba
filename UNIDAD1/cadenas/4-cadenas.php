<?php
$cadena="El abecedario completo es algo largo y detallarlo exhaustivamente es
costoso";
function contador($vocal, $cadena){
    $cadena1= mb_strtolower($cadena);
    $contador= substr_count($cadena1, $vocal);
    return " En la frase 'El abecedario completo es algo largo y detallarlo exhaustivamente es
            costoso' la vocal '$vocal' aparece: ------ $contador veces <br>";
}
echo contador("a", $cadena1);
echo contador("e", $cadena1);
echo contador("i", $cadena1);
echo contador("o", $cadena1);
echo contador("u", $cadena1);

?>