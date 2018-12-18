<?php
include ("bGeneral.php");

session_start();
cabecera('Ejemplo 2');
//Probamos las variables creadas en la pagina 1

print "<p>Su nombre es: ". $_SESSION ["nombre"];
?>
