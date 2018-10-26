<?php
//pavila
include 'bGeneral.php';
include 'expresionesRegulares.php';
$error= false;
$errores=[];

cabecera("FORMULARIO");

if(isset($_POST['enviar'])){
    
    if(empty($_POST['texto'])){
        $error=true;
        $errores['texto']="EL TEXTO ESTA VACIO POR FAVOR INTRODUCE COSITAS";
    }else{
        $texto=$_POST['texto'];
        $expresion=$_POST['seleccion'];
        
        switch($expresion){
            case "codigopostal":
                if(codigoPostal($texto)){
                    $resultado="EL CODIGO POSTAL ES CORRECTO";
                }else{
                    $resultado="EL CODIGO POSTAL ES INCORRECTO";
                }
                
                break;
            
            case "telefono":
                if(numTelefono($texto)){
                    $resultado="EL TELEFONO ES CORRECTO";
                }else{
                    $resultado="EL TELEFONO ES INCORRECTO";
                    $error=true;
                    $errores['telefono']=$resultado;
                   
                }
              
                break;
                
                
            case "direccion":
                if(direccion($texto)){
                    $resultado="LA DIRECCION ES CORRECTA";
                }else{
                    $resultado="LA DIRECCION ES INCORRECTA";
                }
                
                break;
                
            case "usuario":
                if(compruebaUsuario($texto)){
                    $resultado="LA USUARIA ES CORRECTA";
                }else{
                    $resultado="LA USUARIA ES INCORRECTA";
                }
                
                break;
                
            case "email":
                if(compruebaEmail($texto)){
                    $resultado="LA CORREO ES CORRECTA";
                }else{
                    $resultado="LA CORREO ES INCORRECTA";
                }
                
                break;
                
            case "otro":
                if(empty($_POST['expresion'])){
                    $error=true;
                    $errores['expresion']="EL CAMPO EXPRESION ESTA VACIO POR FAVOR INTRODUCE COSITAS";
                    
                }else{
                    $resultado=preg_match("/$texto/", $_POST['expresion']);
                    
                }
                
  
                break;
        }
       
        
    }
    if($error){
        print_r($errores);
        include 'formulario.php';
        
    }else{
        echo $resultado;
        include 'formulario.php';
    }
    
    
}else{
    
    include 'formulario.php';
    
}

?>
