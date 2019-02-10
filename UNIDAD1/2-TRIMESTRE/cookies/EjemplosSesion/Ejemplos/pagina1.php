<?php
include ("bGeneral.php");

//Las siguientes directivas pueden modificarse en el archivo php.ini o en efecución con ini_set



/*Con la siguiente instrucción cambiamos en tiempo de ejecución la directiva
 * session.cookie_lifetime
 * Con valor 0 la cookie de sesión no desaparece hasta que no cerramos el navegador
 * Con valor diferente a 0 se cerrará cuando pases el nº de segundos de inactividad que pongamos 
 * y se mantendrá aunque cerremos en navegador. Cierre por inactividad
 */
print_r ($_COOKIE);
//ini_set("session.cookie_lifetime", 0);

/*
 * session.gc_maxlifetime Marcamos el tiempo que tarde el fichero de sesión en considerarse "basura" para poder pasar a ser
 * borrado según marquemos con el cociente de borrado gc_probability gc_divisor.
 * Aunque haya sido considerado basura la sesión sigue funcionando
 */

// ini_set('session.gc_maxlifetime', 60);

/*Hacemos que desaparezca del servidor la información
 * de las sesiones destruidas o caducadas. Cada dos session:start.
 * Un valor así sobrecargaría el servidor, mejor valores entre 100 y 200 para servidores en producción
 */

//ini_set ('session.gc_probability', 5);
//ini_set('session.gc_divisor', 10);
session_start();
cabecera('Ejemplo 1');
$_SESSION["nombre"] = "Pepe Pérez";
echo "<p>Se ha guardado su nombre ". $_SESSION["nombre"].".</p>";

pie();
?>
