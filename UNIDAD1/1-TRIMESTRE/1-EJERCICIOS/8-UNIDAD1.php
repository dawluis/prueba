<?php
$num=1;
$color=1;
echo "<table border= 1px solid>";
for($i=1; $i<=10; $i++){
    echo "<tr>";
    for($j=1; $j<=10; $j++){
        if($color%2==1){
        echo "<td>";
        echo $num++;
        echo "</td>";
        }else{
            echo "<td style= background-color:grey;>";
            echo $num++;
            echo "</td>";  
        } 
    }
    $color++;
    echo "</tr>";  
}

?>