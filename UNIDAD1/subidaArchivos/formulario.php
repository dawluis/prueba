<?php
include 'bGeneral.php';

$error=false;
$errores=[];

if(isset($_POST['enviar'])){
    
    $nombre=recoge('nombre');
    $edad=recoge('edad');
    $email=recoge('email');//asdsdfsdfs
     
    if(cTexto($nombre)==0){
        $error=true;
        $errores['nombre']="El nombre no es correcto";
    }
    if(cNum($edad)==0){
        $error=true;
        $errores['edad']="El edad no es correcto";
    }
    if(validaEmail($email)==0){
        $error=true;
        $errores['email']="El email no es correcto";
    }
    if($_FILES['imagen']['name']==""){
        $error=true;
        $errores['imagen']="No se ha subido ninguna imagen";
    }
    
     
    if($error){
        
       print_r($errores);
     
      
    include 'form.php';
	    
    }else{
        
            
        
        $var='imagen';
        $dir="imagenes/";
        $max_file_size = "512000";
        $extensionesValidas = array(
            "jpg",
            "gif",
            "png"
        );
        $resultadoSubida=subidaArchivos($var, $dir, $max_file_size, $extensionesValidas);
        if(is_array ($resultadoSubida)){
            echo "ha fallado la subida de la imagen<br>";
            print_r($resultadoSubida);
            
        }else{
            echo "TODOS LOS DATOS SON CORRECTOS<br>";
            echo "Nombre: $nombre <br> Edad: $edad <br> Email: $email <br>";
            echo "imagen del usuario: <br> <img src='$resultadoSubida' width='250px'>";
        }
        }
}else{
    include 'form.php';
}
?>