<?php
$error=false;
$errores=[];
include 'bGeneral.php';
cabecera("index");

if(!isset($_REQUEST['enviar'])){
    
    include 'form.php';
    
}else{
    $nombre=recoge('nombre');
    $nombreUsuario=recoge('nombreUsuario');
    $contrasena=recoge('contrasena');
    $email=recoge('email');
    $fechaNacimiento=strval(recoge('fecha'));
    
    if(empty($nombre)||!validaNombre($nombre)){
        $error=true;
        $errores['nombre']="El nombre no es correcto";
    }
    if(!validaNombreUsuario($nombreUsuario)){
        $error=true;
        $errores['nombreUsuario']="El nombre de usuario no es correcto";
        
    }
    if(!validaContrasena($contrasena)){
        $error=true;
        $errores['contrasena']="El contraseña no es correcto";
    }
    if(!validaEmail($email)){
        $error=true;
        $errores['email']="El email es incorrecto";
    }
    if(empty($fechaNacimiento)){
        $error=true;
        $errores['fecha']="La fecha no es correcta";
    }else{
        if(!validaFecha($fechaNacimiento)){
            $error=true;
            $errores['fecha']="La fecha no es correcta"; 
        }
    }
    if($_FILES['img']['name']==""){
        $error=true;
        $errores['img']="no se ha introducido imagen";
    }
    
    if(!$error){
        $var='img';
        $dir="imagenes/";
        $max_file_size=200000;
        $extensionesValidas= array ("jpg","jpeg","gif","png");
        
        $resultadoSubida=subidaArchivos($var, $dir, $max_file_size, $extensionesValidas);
        
        if(is_array($resultadoSubida)){
            include 'formFail.php';
        }else{
            
            $archivo="usuarios.txt";
            $file=fopen($archivo, 'a+');
            fwrite($file, "$nombre;");
            fwrite($file, "$nombreUsuario;");
            fwrite($file, "$contrasena;");
            fwrite($file, "$email;");
            fwrite($file, "$resultadoSubida".PHP_EOL);
            fclose($file);
            header("location:correcto.php");
        }
    }else{  
        include 'formFail.php';
        
    }
}
 
 ?>   

</body>
</html>
