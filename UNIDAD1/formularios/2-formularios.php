<?php
$numero= $_REQUEST['numero'];


for($i=1; $i<=10; $i++){
    
    $multi=$numero*$i;
    echo" $i x <b>$numero</b> = $multi <br>";
    
}

echo"<a href='2-form.html'>VOLVER</a>";

?>
