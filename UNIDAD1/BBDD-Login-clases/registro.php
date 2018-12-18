<?php
require_once 'ValidarFormulario.php';
require_once 'bGeneral.php';
include 'conexion.php';
$bd= new Modelo();
$valida=new ValidarFormulario();
cabecera("login");
if(!isset($_REQUEST['enviar'])){
    include 'formRegistro.php';
    
}else{
    $user=recoge('user');$passwd=recoge('password');$userAmigo1=recoge('user_amigo1');$emailAmigo1=recoge('email_amigo1');$userAmigo2=recoge('user_amigo2');$emailAmigo2=recoge('email_amigo2');
    $resultadoRegistro=$valida->ValidaRegistroUsuario($user, $passwd, $userAmigo1, $emailAmigo1, $userAmigo2, $emailAmigo2);
    if(is_array($resultadoRegistro)){
        $errores=$resultadoRegistro;
        include 'formRegistro.php';
        
    }else{
        $encriptada=crypt_blowfish($passwd); 
        try{
        $bd->beginTransaction();
        $bd->registroUsuario($user, $encriptada);
        $ultimoId=$bd->lastInsertId();
        $bd->registroAmigos($userAmigo1, $emailAmigo1, $ultimoId);
        $bd->registroAmigos($userAmigo2, $emailAmigo2, $ultimoId);
        $bd->commit();
        echo "USUARIO Y AMIGOS AÑADIDOS CORRECTAMENTE<br>";
        echo"<a href='login.php'>LOGIN</a>";
        
        }catch (PDOException $e){
            $bd->rollBack();
            if ($e->getCode() == 23000){
                // Guardamos los mensajes de errore para posteriormente mostrarlos
                echo $Mensajeerrores = "Ya existe ese usuario en la BD";
            }else{
                echo $Mensajeerrores = "Ha sucedido un error en la inserción";
            }
            include 'formRegistro.php';
        } 
    }
}
pie();
?>
