<?php

/*
 * En este ejemplo vemos cómo cambiar algún valor del contenido cargado en memoria.
 * Para cambiar el fichero, tenemos que "guardar cambios" después de realizar los cambios.
 */
if (!file_exists('usuarios.xml')) {

    echo "El fichero no existe";
} else {

// Nuevo objeto SimpleXMLElement al que se le pasa un archivo xml
$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
// Usuario 0 antes de cambiar:
echo "Nombre: " . $usuarios->usuario[0]->nombre . "<br>";
// Usuario 0 cambiando el nombre
//ESto no cambia el archivo .xml, sólo cambia lo que tenemos cargado en memoria
$usuarios->usuario[0]->nombre = "María";
echo "Nombre: " . $usuarios->usuario[0]->nombre . "<br>";

//Para guardar los cambios, lo hacemos con la siguiente línea que aparece comentada
$usuarios->asXML('usuarios.xml');
}
?>