<?php
include ("bGeneral.php");
/*Con la siguiente instrucción cambiamos en tiempo de ejecución la directiva
 * session.cookie_lifetime
 * Hacemos que no desaparezca la cookie al cerrar el navegador
 * Ver la diferencia al ejecutarlo de una forma u otra
 */
//ini_set("session.cookie_lifetime", 60);


session_start();
cabecera('Ejemplo 1');
$_SESSION["nombre"] = "Pepe Pérez";
echo "<p>Se ha guardado su nombre ". $_SESSION["nombre"].".</p>";


pie();
?>
