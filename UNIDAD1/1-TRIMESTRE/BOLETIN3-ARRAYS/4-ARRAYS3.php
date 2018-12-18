<?php
$equipos= array(
    1=>array(1=>array(1=>"pepe",2=>"juan"),2=>array(1=>"carlos", 2=>"Rafa")),
    2=>array(1=>array(1=>"pepe",2=>"juan")),
    3=>array(1=>array(1=>"pepe",2=>"juan"),2=>array(1=>"pepe",2=>"juan"))
);
foreach($equipos as $index => $pais){
     echo "<b>EL PAIS $index</b> <br>";
    foreach($pais as $equipos => $equipo){
        echo "EL EQUIPO $equipos <br>";
        foreach($equipo as $posiciones => $jugador){
            echo" EN LA POSICION $posiciones juega el jugador $jugador <br>" ;
        }
    }
    echo "<br>";  
}
$equiposAso= array(
    "España"=>array("Barcelona"=>array("Portero"=>"pepe","Delantero"=>"juan"),"Madrid"=>array("Portero"=>"carlos", "Delantero"=>"Rafa")),
    "Mexico"=>array("Cajun"=>array("Portero"=>"pepe","Delantero"=>"juan")),
    "Argentina"=>array("Boca"=>array("Portero"=>"pepe","Delantero"=>"juan"),"Boludo"=>array("Portero"=>"pepe","Delantero"=>"juan"))
);

echo"<tr>";
echo"</tr>";
echo"<td>";
echo"</td>"; 


foreach($equiposAso as $valor => $pais){
    echo "<table border=1px black solid>";
    echo"<tr><td style='background-color:grey'>PAIS</td><td style='background-color:grey'>$valor</td></tr>";
     
    foreach($pais as $equipos => $equipo){
        echo"<tr><td style='background-color:red'>EQUIPO</td><td style='background-color:red'>$equipos</td></tr>";
        
        foreach($equipo as $posicion => $player){
            echo"<tr><td>JUGADOR</td><td>$player</td></tr>";
            echo"<tr><td>POSICION</td><td>$posicion</td></tr>";
        }
        
    }
    echo "</table><br>";
}
?>