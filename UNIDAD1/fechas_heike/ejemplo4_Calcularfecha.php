<?php
/*
 * Ejemplos de los apuntes con mktime
 * echo date("M-d-Y", mktime(0, 0, 0, 12, 32, 1997));
 * echo date("M-d-Y", mktime(0, 0, 0, 13, 1, 1997));
 * echo date("M-d-Y", mktime(0, 0, 0, 1, 1, 1998));
 * echo date("M-d-Y", mktime(0, 0, 0, 1, 1, 98));
 */
// Recuperamos la fecha actual en formato array
include ('bGeneral.php');
//La función cabecera es una función propia que introduce la cabecera html
cabecera($_SERVER['PHP_SELF']);
$today = getdate ();
$month = $today ['mon'];
$day = $today ['mday'];
$year = $today ['year'];

// Calculamos la fecha dentro de 90 días
$garantia_expira = mktime ( 0, 0, 0, $month, $day + 90, $year );

//Mostramos la fecha con el formato adecuado
echo (date ( "d-m-Y", $garantia_expira ));
?>


