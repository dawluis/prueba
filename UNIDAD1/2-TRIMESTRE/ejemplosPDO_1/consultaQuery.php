
<?php
// EJEMPLO DE CONSULTA DE SELECCIÓN DE REGISTROS CON QUERY
include ('bConecta.php');
try {
    $consulta = "SELECT * FROM usuarios";
    $result = $db->query($consulta);
    // Nos devuelve un objeto PDOStatement
    // Podemos recorrerlo como un array aunque no lo es

    foreach ($result as $row) {
        echo $row['usuario'] . "  ";
        echo $row['clave'] . "<br>";
    }
    // Libero la conexión
    $db = NULL;
    
} catch (PDOException $e) {
    
    //Usar error_log para guardar errores para el administrador
    //Para realizar esta acción sería conveniente crear una clase para manejar el archivo log
    error_log($e->getMessage().microtime().PHP_EOL,3,"logdb.txt");
    
  
   $errores= "Ha sucedido un error en la consulta";
}

catch (Error $e) {
    
    error_log($e->getMessage().microtime().PHP_EOL,3,"logerr.txt");
    $errores="Excepción error capturada <br>";
    
}
echo $errores;

?>

