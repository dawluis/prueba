<?php

   include 'coche.php';
   
   $coche= new Coche("blue", "renault", "ruina", 500, 1000, 2);
   $coche1= new Coche("rojo", "citroen", "ruina", 500, 1000, 2);
   $coche2= new Coche("verde", "mercedes", "ruina", 500, 1000, 2);
   
    echo $coche->mostrarInfo($coche);

?>