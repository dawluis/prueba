<?php
include ("bGeneral.php");
session_start();
cabecera('Ejemplo 4');

$_SESSION["nombre"] = "Pepe Pérez";

if (isset($_SESSION["nombre"])) {
    print "<p>Su nombre es $_SESSION[nombre].</p>";
} else {
    print "<p>No sé su nombre.</p>";
}
//Cierro sesión
session_destroy();
//Elimino las variables de sesión
unset($_SESSION["nombre"]);

if (isset($_SESSION["nombre"])) {
    print "<p>Su nombre es $_SESSION[nombre].</p>";
} else {
    print "<p>No sé su nombre.</p>";
}

?>
