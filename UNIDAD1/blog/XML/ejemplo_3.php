<?php
/*
 * La última forma de accder al contenido del fichero XML será crando un objeto
 * que toma como origen de los datos el fichero xml
 */
if (!$usuarios = file_exists('usuarios.xml')) {
    
    echo "El fichero no existe";
} else {
    
    // Nuevo objeto SimpleXMLElement al que se le pasa ruta de archivo
    $xml = new SimpleXMLElement('usuarios.xml', 0, true);
    
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
        //Es más recomendable acceder a los hijos de esta manera
        foreach ($usuario->contacto as $contact) {
            echo "Teléfono: " . $contact->telefono . "<br>";
            echo "Email: " . $contact->email . "<br>";
        }
    }
}
?>