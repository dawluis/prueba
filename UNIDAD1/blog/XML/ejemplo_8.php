<?php
/* En este ejemplo vemos otro método children que permite acceder a los hijos de un nodo
 * 
 */

$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
// foreach para acceder a hijos de elementos
foreach ($usuarios->children() as $usuario){
    echo '</br><pre>';
    //Con la siguiente línea comentada podemos ver lo que obtenemos con e método children()
   print_r($usuario);
    echo '</pre>';
    echo "Nombre de usuario: " . $usuario->nombre . "<br>";
    foreach ($usuario->children() as $contact){
        if (isset($contact->telefono)){
        echo "Telefono: " . $contact->telefono . "<br>";
            }
        }
    }

?>