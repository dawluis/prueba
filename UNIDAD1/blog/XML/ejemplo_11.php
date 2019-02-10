<?php
/* Uso del método getName
 * 
 */

// Nuevo objeto SimpleXMLElement al que se le pasa un archivo xml
$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
echo $usuarios->getName(). "<br>"; // usuarios
echo $usuarios->usuario->getName(). "<br>"; // usuario
// Elementos disponibles en usuario:
foreach ($usuarios->usuario[0] as $user){
    echo $user->getName() . "<br>";
}
?>



