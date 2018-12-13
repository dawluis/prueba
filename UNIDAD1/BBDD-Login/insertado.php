<?php
$user=$_POST['user'];
$passwd=$_POST['password'];
$encriptada=crypt_blowfish($passwd);

$sql="INSERT INTO usuarios (usuario,password) VALUES ('$user','$encriptada')";
try{
    $resultado=$bd->exec($sql);
    echo $encriptada;
    echo $resultado;
    
    
    
    
}catch (PDOException $e){
    // Usar error_log para guardar errores para el administrador
    // Para realizar esta acción sería conveniente crear una clase para manejar el archivo log
    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "log.txt");
    // En este caso capturamos el caso de CP duplicada
    if ($e->getCode() == 23000)
        // Guardamos los mensajes de errore para posteriormente mostrarlos
        echo $errores = "Ya existe ese usuario en la BD";
        else
            echo $errores = "Ha sucedido un error en la inserción";
            
}
?>