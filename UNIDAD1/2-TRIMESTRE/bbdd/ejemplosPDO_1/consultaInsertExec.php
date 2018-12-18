
<?php
// Consulta que realiza un INSERT la lanzamos con exec ya no devuelve filas
// Cuenta el número de filas introducidas
// Sirve tambien para DELETE y UPDATE

// Aparece también como capturar la excepción
include ('bConecta.php');
include ('bGeneral.php');
cabecera();

$consulta = "INSERT INTO usuarios (usuario) VALUES ('camión')";

// Podemos capturar las exepciones que pueda producir la cosulta

try {
    // Si ejecutamos la consulta con exec, devuelve el número de filas afectadas
    // Exec no sirve con SELECT
    $count = $db->exec($consulta);
    echo $count;
    $db = NULL;
} catch (PDOException $e) {

    // Usar error_log para guardar errores para el administrador
    // Para realizar esta acción sería conveniente crear una clase para manejar el archivo log
    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "log.txt");

    // En este caso capturamos el caso de CP duplicada
    if ($e->getCode() == 23000)
        // Guardamos los mensajes de errore para posteriormente mostrarlos
        $errores = "Ya existe ese usuario en la BD";
    else
        $errores = "Ha sucedido un error en la inserción";
} catch (Error $e) {

    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logerr.txt");
    $errores = "Excepción error capturada <br>";
}

echo $errores;

?>
</body>