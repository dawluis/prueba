<?php
$colores= array(
    "fuertes"=>array("rojo"=>"FF0000","verde"=>"00FF00","azul"=>"0000FF"),
    "suaves"=>array("rosa"=>"FE9ABC", "amarillo"=>"FDF189", "malva"=>"BC8F8F")
);
echo"<table border=1px black solid>";
foreach($colores as $tipo => $arrays){
    echo"<tr><td>Colores $tipo</td>";
    foreach($arrays as $color=> $codigo){
        echo"<td style='background-color:$codigo'> $color : $codigo </td>";
    }
    echo"</tr>"; 
}
   echo "</table>";
   
   // LA FUNCION in_array COMPRUEBA SI EXISTE UN VALOR DENTRO DEL UN ARRAY Y DEVUELVE TRUE O FALSE EN FUNCION SI LO ENCUENTRA O NO
   //EN ESTE CASO SI PONEMOS UN ARRAY MULTIDIMENSIONAL NO PUEDE OBTENER EL RESULTADO YA QUE NECESITA SER RECORRIDO PARA REALIZAR COMPROBACIONES.
   foreach($colores as $tipo){
       if(in_array("00FF00", $tipo)){
           echo "EXISTE";
           break;
       }else{
           echo "NO EXISTE";
       }
   }
   
   
  
   
?>