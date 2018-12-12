<?php
include ("bGeneral.php");

session_start();
cabecera('Ejemplo 3');


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


if (isset($_SESSION["nombre"])) {
    print "<p>Aunque la sesión está destruida puedo acceder todavía a las variables. </br> Su nombre es $_SESSION[nombre].</p>";
} else {
    print "<p>No sé su nombre.</p>";
}

?>
