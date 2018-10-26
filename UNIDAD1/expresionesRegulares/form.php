<?php
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
                    $resultado="LA CALLE ES CORRECTA";
                }else{
                    $resultado="LA CALLE ES INCORRECTA";
                }
                
                break;
        }
        echo $resultado;
        
    }
    if($error){
        print_r($errores);
        include 'formulario.php';
        
    }
    
    
}else{
    
    include 'formulario.php';
    
}

?>