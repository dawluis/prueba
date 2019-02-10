<?php
session_start();
$_SESSION["nombre"] = "Pepe Pérez";

if (isset($_SESSION["nombre"])) {
    print "<p>Su nombre es $_SESSION[nombre].</p>";
} else {
    print "<p>No sé su nombre.</p>";
}

unset($_SESSION["nombre"]);

if (isset($_SESSION["nombre"])) {
    print "<p>Su nombre es $_SESSION[nombre].</p>";
} else {
    print "<p>No sé su nombre.</p>";
}

?>
