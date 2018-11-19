<?php
$error=false;
$errores=[];
include 'bGeneral.php';
cabecera("index");

if(!isset($_REQUEST['enviar'])){
    
    include 'form.php';
    
}else{
    $nombre=sinTildes(sinEspacios(recoge('nombre')));
    $nombreUsuario=sinTildes(sinEspacios(recoge('nombreUsuario')));
    $contrasena=sinTildes(sinEspacios(recoge('contrasena')));
    $email=sinTildes(sinEspacios(recoge('email')));
    $fechaNacimiento=sinTildes(sinEspacios(recoge('fecha')));
    
    if(empty($nombre)||!validaNombre($nombre)){
        $error=true;
        $errores['nombre']="El nombre no es correcto";
    }
    if(empty($nombreUsuario)||!validaNombreUsuario($nombreUsuario)){
        $error=true;
        $errores['nombreUsuario']="El nombre de usuario no es correcto";
        
    }
    if(empty($contrasena)||!validaContrasena($contrasena)){
        $error=true;
        $errores['contrasena']="El contraseña no es correcto";
    }
    if(empty($email)||!validaEmail($email)){
        $error=true;
        $errores['email']="El email es incorrecto";
    }
    if(empty($fechaNacimiento)||!validaFecha($fechaNacimiento)){
        $error=true;
        $errores['fecha']="La fecha no es correcta";
    }
    if(!isset($_FILES['img'])){
        $error=true;
        $errores['img']="No se ha subido ningun archivo";
    }
    
    if(!$error){
        $var='img';
        $dir="imagenes";
        $max_file_size=200000;
        
        $resultadoSubida=subidaArchivos($var, $dir, $max_file_size, $extensionesValidas);
        
        header("location:correcto.php");
        
        
    }else{
        
        include 'formFail.php';
        
    }
}
 
 ?>   

</body>
</html>
