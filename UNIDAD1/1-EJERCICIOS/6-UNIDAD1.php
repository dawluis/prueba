<?php

echo "<table border=1px solid>";
for($i=0; $i<=10; $i++){
    echo "<tr>";
    
    for($j=1; $j < 10; $j++){
        
        if($i==0){
            echo "<td>";
            echo "TABLA DEL $j";
            echo "</td>";
        }else{
        echo "<td>";
        echo " $j x $i =";
        $multi=$i*$j;
        echo $multi;
        
        echo "</td>";
        }}
    echo "</tr>";
}
echo "</table>";







?>