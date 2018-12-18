<?php
$arrayMulti=array(
    array (1,2,3,4,5),
    array (1,2,3,4)
);
$array= array("titulo"=>"hola","nombre"=>"jose","aepllido"=>"cabrera");
function tabla($array,$bgcolor="blue",$width="400px"){
    echo'<table style="border:2px solid black; background:'.$bgcolor.'; margin: 0 auto; width:'.$width.'">';
    foreach($array as $key => $value){
        if(is_array($value)){
            echo"<tr>";
            foreach($value as $valor){
                echo "<td>$valor</td>";
            }
            echo"</tr>";
        }else{
            echo "<tr> <td> $key </td><td> $value </td> </tr>  ";}
    }
    echo"</table>";  
}
tabla($arrayMulti);

?>