<?php
session_start();
include ("bGeneral.php");
cabecera('Ejemplo 2');
if (isset($_SESSION["nombre"])) {
    print "<p>Su nombre es $_SESSION[nombre].</p>";
} else {
    print "<p>No sé su nombre.</p>";
}
//Eliminamos la variable sesión

/*Ver la diferencia cuando hacemos sessio_destroy, sigue apareciendo el valor 
 * almacenado en la variable hasta que termina el script
 * en cambio cuando hago unset, elimino la variable en el momento
 * Recomendable, después de session_destroy hacer unset
 */

session_destroy();
unset($_SESSION["nombre"]);

if (isset($_SESSION["nombre"])) {
    print "<p>Su nombre es ".$_SESSION["nombre"]."</p>";
} else {
    print "<p>No sé su nombre.</p>";
}

?>
