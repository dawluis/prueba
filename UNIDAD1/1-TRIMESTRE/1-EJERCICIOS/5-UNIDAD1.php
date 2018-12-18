<?php
for($i=1; $i<=9; $i++){
    echo "<table border=1px solid>";
    
    echo "TABLA DEL $i";
    
    for($j=1; $j<=9; $j++){
        echo "<tr><td>";
        
        echo " $i x $j =";
        
        echo "</td><td>";
        
        $multi=$i*$j;
        
        echo $multi;
        
        echo "</td>";  
    }
    echo "</tr>";
}
echo "</table>";
?>