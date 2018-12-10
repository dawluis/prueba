<?php
include ('ConexionDB.php');

/*
 * Para crear el objeto no lo hacemos con new, lo hacemos con el
 * método estático GetInstance que comprueba primero si ya hay una conexión, si hay
 * una conexiín nos la devuelve y no crea otra. (PATRÓN DE SINGLETON)
 */

$errores="";
try {
    $db = modelo::GetInstance();
    $stmt = $db->getUsuario("Pedro");

    if ($stmt->rowCount() > 0) {
        foreach ($stmt as $valor)
            echo "<p>$valor[usuario] $valor[clave]</p>\n";
    } else {
        echo 'No hay registros de resultado';
        // throw new Exception('No hay registros de resultado');
    }
} catch (PDOException $e) {

    // Usar error_log para guardar errores para el administrador
    // Para realizar esta acción sería conveniente crear una clase para manejar el archivo log
    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logdb.txt");

    $errores = "Ha sucedido un error en la consulta";
} catch (Error $e) {
    
    error_log($e->getMessage().microtime().PHP_EOL,3,"logerr.txt");
    $errores="Excepción error capturada <br>";
    
}
echo $errores;
?>