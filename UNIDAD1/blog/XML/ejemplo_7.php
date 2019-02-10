<?php
/* En este ejemplo vemos como añadir nodos en el árbol 
 * 
 */
// Escribimos en un fichero que sólo contiene la raiz porque esta 
//estructura no coincide con los documentos de los ejercicios anteriores
$usuarios = new SimpleXMLElement('usuariosCreados.xml', 0, true);
// Añadimos nodo usuario
$nuevoUsuario = $usuarios->addChild('usuario');
//Añadimos atributo dentro del nodo usuario
$nuevoUsuario->addAttribute('sexo', 'Hombre');
//Añadimos nodos nombre y apellido como hijos de usuario
$nuevoUsuario->addChild('nombre', 'Bernard');
$nuevoUsuario->addChild('apellido', 'Madoff');
//Añadimos nodo contacto
$nuevoUsuario->addChild('contacto');
//Añadimos nodo teléfono como hijo de contacto
$nuevoUsuario->contacto->addChild('telefono','435345345');


echo "Vemos resultados <br>";
echo '</br><pre>';
print_r($usuarios);
echo '</pre>';
//Guardamos cambios en archivo
//$usuarios->asXML('usuariosCreado.xml');
?>