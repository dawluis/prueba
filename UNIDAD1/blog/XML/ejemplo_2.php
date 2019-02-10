<?php
/*
 * Podemos tener el ficher xml en una variable string 
 * (podemos haberlo recibido al conectar por ejemplo con algún api externo)
 * En este ejemplo lo simularemos leyendo el contenido del fichero xml con la  función
 * file_get_contents que crga el contenido del fichero en un string. A partir de ahí, creamos un objeto SimpleXM:Elemento
 * que podemos leer como un array asociativo
 */
 
//Cargamos el contenido del fichero en un string
if (! $usuarios = file_get_contents('usuarios.xml')) {
     
    echo "No se ha podido cargar el archivo";
} else {

    //Creamos un objeto que contiene el fichero xml con estructura de array
    $xml = new SimpleXMLElement($usuarios);
    // Mostrar un valor
   
    
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