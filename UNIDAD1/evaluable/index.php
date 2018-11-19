<?php
//Declaramos las variables de error
$error=false;
$errores=[];
//incluimos la biblioteca de funciones para separar y limpiar el codigo
include 'bGeneral.php';

cabecera("index");

//si enviar no se ha pulsado aun, mostramos el formulario
if(!isset($_REQUEST['enviar'])){
    
    include 'form.php';
//si ya se ha pulsado enviar hacemos todas las validaciones y comrpobaciones    
}else{
    //Recogemos y sanitizamos los datos con la funcion recoge
    $nombre=recoge('nombre');
    $nombreUsuario=recoge('nombreUsuario');
    $contrasena=recoge('contrasena');
    $email=recoge('email');
    $fechaNacimiento=strval(recoge('fecha'));
    
    //Validaciones    
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
    //Si no hay errores, entonzes procedermos a la subida del fichero
    if(!$error){
        $var='img';
        $dir="imagenes/";
        $max_file_size=200000;
        $extensionesValidas= array ("jpg","jpeg","gif","png");
        /*Realizamos la subida de archivos mediante la funcion subidaArchivos.
        Esta funcion devulve el nombre del archivo subido si se sube correctamente
        Ó el array de errores si hay algun error*/
        $resultadoSubida=subidaArchivos($var, $dir, $max_file_size, $extensionesValidas);
        //Si es un array, es decir hay errores, nos devuelve al formulario con errores directamente
        if(is_array($resultadoSubida)){
            include 'formFail.php';
        //Sino Empezamos a escribir los datos en el archivo usuarios.txt
        }else{
            $archivo="usuarios.txt";
            $file=fopen($archivo, 'a+');
            fwrite($file, "$nombre;");
            fwrite($file, "$nombreUsuario;");
            fwrite($file, "$contrasena;");
            fwrite($file, "$email;");
            fwrite($file, "$resultadoSubida".PHP_EOL);
            fclose($file);
            //Cuando finalizamos la escritura, nos dirigira a correcto.php
            header("location:correcto.php");
        }
     //Si $error es true, es decir si hay errores nos devuelve al formulario con errores
    }else{  
        include 'formFail.php';
        
    }
}
 pie();
 ?>   
