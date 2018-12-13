<?php
//DUDAS
//SI NO EXISTE PORQUE ME DA TRUE?
//COMO HAGO LA COMPROBACION DE SI HA DEVUELTO 1 VALOR LA CONSULTA DEL PASSWORD ?
//EL USO DEL TRY Y CATCH AQUI
//COMO PONGO LAS TRANSACCIONE


include 'bGeneral.php';
include 'conexion.php';
$bd= new Modelo();
cabecera("login");
if(!isset($_REQUEST['enviar'])){
    include 'form.php';
    
}else{
    
    $user=$_POST['user'];
    $passwd=$_POST['password'];
    //$encriptada=crypt_blowfish($passwd);
    
    try{
        $sql="SELECT password FROM usuarios WHERE usuario=:user";
        $prep=$bd->prepare($sql);
        $prep->bindParam(':user', $user);
        $res=$prep->execute();
        $contador=0;
        echo $res;//SI NO EXISTE PORQUE ME DA TRUE?
            
            //COMO HAGO LA COMPROBACION DE SI HA DEVUELTO UN VALOR?
            while($result = $prep->fetch()){
                $contrasena = $result['password'];
                $contador++;
            } 
            if($contador == 1){
                echo "USuario encontrado";
                echo "<br> Y LA CONTRASEÑA ES $contrasena";
            }else{
                header('location:login.php');
            }
    
    //EL USO DEL 
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
    
    
    
    
}
pie();
?>
