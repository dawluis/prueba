
<?php
/*
 * Podemos cargar el fichero xml con la función simplexml_load_file,
 * nos devuelve el fichero en una estructura de objeto simplexml que podemos recorrer como array
 * Hay que tener en cuenta que php realiza un análisis de la correción sintáctica
 * antes de la carga del fichero xml
 */
 
if (!$xml = simplexml_load_file('usuarios.xml')) {
     
    echo "No se ha podido cargar el archivo";
} else {
    echo "El archivo se ha cargado correctamente";
    echo '</br><pre>';
    print_r($xml);
    echo '</pre>';
    foreach ($xml as $usuario) {
        echo 'Nombre: ' . $usuario->nombre . '<br>';
        echo 'Apellido: ' . $usuario->apellido . '<br>';
        echo 'Dirección: ' . $usuario->direccion . '<br>';
        echo 'Ciudad: ' . $usuario->ciudad . '<br>';
        echo 'País: ' . $usuario->pais . '<br>';
        echo 'Teléfono: ' . $usuario->contacto->telefono . '<br>';
        echo 'Url: ' . $usuario->contacto->url . '<br>';
        echo 'Email: ' . $usuario->contacto->email . '<br>';
    }
}
?>