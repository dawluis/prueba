<?php
//DUDAS
//SI NO EXISTE PORQUE ME DA TRUE?
//COMO HAGO LA COMPROBACION DE SI HA DEVUELTO 1 VALOR LA CONSULTA DEL PASSWORD ?
//EL USO DEL TRY Y CATCH AQUI
//COMO PONGO LAS TRANSACCIONE

session_start();
require_once 'bGeneral.php';
include 'conexion.php';
include 'ValidarFormulario.php';
$valida= new ValidarFormulario();
$bd= new Modelo();
cabecera("login");
if(!isset($_REQUEST['enviar'])){
    include 'form.php';
    
}else{
    $user=recoge('user');
    $passwd=recoge('password');
    $resultado=$valida->ValidaLogin($user,$passwd);
    if(is_array($resultado)){
        include 'form.php';
        print_r($resultado);
    }else{
        try{
            $resultadoLogin=$bd->login($user, $passwd);
            if($resultadoLogin==1){
                $_SESSION['nombre']=$user;
                header('location:bienvenido.php');
            }else{
                include 'form.php';
                echo "$resultadoLogin<br>";
                echo "SI AUN NO ESTAS REGISTRADO PUEDES HACERLO AQUI <a href='registro.php'>Registrarse</a>";
            }
            
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
 
}
pie();
?>
