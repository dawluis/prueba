<?php
include 'bGeneral.php';
include 'expresionesRegulares.php';
$error= false;
$errores=[];

cabecera("FORMULARIO");

if(isset($_POST['enviar'])){
    
    if(empty($_POST['texto'])){
        $error=true;
        $errores['texto']="EL TEXTO ESTA VACIO";
    }else{
        
        
        
        
        
    }
    if($error){
        print_r($errores);
        
        include 'formulario.php';
        
    }
    
    
}else{
    
    include 'formulario.php';
    
}

?>