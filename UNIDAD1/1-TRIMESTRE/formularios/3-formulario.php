<?php


$menor= $_REQUEST['numeroMenor'];
$mayor= $_REQUEST['numeroMayor'];
$aux=$mayor;

for($i= $menor ; $i <= $mayor ; $i++){
    
    echo "(".$aux--.",".$menor++.")";
}

echo"<a href='3-form.html'>VOLVER</a>";


?>