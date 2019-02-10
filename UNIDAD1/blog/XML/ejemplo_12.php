<?php
/* Tratamiento de errores
 * 
 */

// Habilita el manejo de errores del usuario
//libxml_use_internal_errors(true);
$sxe = simplexml_load_string("<?xml version='1.0'><roto><xml></roto>");
if ($sxe === false) {
    echo "Error cargando XML\n";
//Maneja los errores
   // foreach(libxml_get_errors() as $error) {
   //     echo "<br>", $error->message;
   // }
}
?>



