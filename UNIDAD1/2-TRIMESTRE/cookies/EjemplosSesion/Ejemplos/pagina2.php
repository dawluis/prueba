<?php

//Probamos las variables creadas en la pagina 1
session_start();


include ("bGeneral.php");
cabecera('Ejemplo 2');
print "<p>Su nombre es: ". $_SESSION ["nombre"];
?>
