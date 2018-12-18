<?php

$numero=rand(1,9);

echo "<table border= 1px solid>";

for($i=1; $i<=9; $i++){
    echo "<tr>";
    echo "<td>";
    $multi= $numero*$i;
    echo " $numero x $i = ";
    echo "</td>";
    echo "<td>";
    echo  "$multi";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";






?>