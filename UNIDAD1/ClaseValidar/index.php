<?php
include 'bGeneral.php';
include 'validarFormulario.php';


if(!isset($_REQUEST['enviar'])){
    include 'formRegistro.php';    
}else{
    $nombreUsuario=recoge('nombreUsuario');
    $contrasena= recoge('contrasena');
    $email= recoge('email');
    $fecha= recoge('fecha');
    
    $validar= new ValidarFormulario();
    
    $errores=$validar->ValidaUsuario($nombreUsuario, $contrasena, $email, $fecha);
    
    if(is_array($errores)){
        include 'formRegistro.php'; 
        
    }else{
        echo "todo bien";   
    }
    
}



?>