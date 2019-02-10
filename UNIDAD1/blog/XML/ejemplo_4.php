<?php
/*
 * En este ejemplo cómo acceder de forma sencilla a los atributos del primer usuario
 */
if (! $usuarios = file_exists('usuariosAtributos.xml')) {
    
    echo "El fichero no existe";
} else {
    
    // Nuevo objeto SimpleXMLElement al que se le pasa ruta de archivo
    $xml = new SimpleXMLElement('usuariosAtributos.xml', 0, true);
    
    echo "El archivo se ha cargado correctamente";
    echo '</br><pre>';
    print_r($xml);
    echo '</pre>';
    
    //echo "Nombre de usuario:" . $xml->usuario[0]->nombre . "<br>";
    
    // Accedemos a los atributos como si fuese un array donde el índice es el nombre del atributo
    echo "Nombre de usuario:" . $xml->usuario[0]->nombre . "<br>";
    foreach ($xml->usuario[0]->contacto as $contacto) {
        switch ( $contacto['tipo']) {
            case 'telefono':
                echo "Telefono: " . $contacto . "<br>";
                break;
            case 'email':
                echo "Email: " . $contacto . "<br>";
        }
    }
    
    echo "prueba";
}
?>