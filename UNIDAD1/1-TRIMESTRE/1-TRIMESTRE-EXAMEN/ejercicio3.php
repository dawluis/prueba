<?php
include 'bExamen.php';
cabecera("EJERCICIO-3");
if(!isset($_REQUEST['insertar'])){
    //UTILIZO EL ARCHIVO QUE NOS PASASTE COMO FORMULARIO COLOCADO CON INCLUDE
    include 'ejercicio_3.php';
}else{
    //RECOGEMOS Y SANITIZAMOS LOS DATOS
    $error=false;
    $nombre=recoge("nombre");
    $usuario=recoge("usuario");
    $fecha=recoge("fecha");
    
    //VALIDAMOS LOS DATOS
    if(!cTexto($nombre, $errores)){
        $error=true;
    }
    if(!cUsuario($usuario, $errores)){
        $error=true;
    }
    
    if(!compruebaFecha($fecha)){
        $error=true;
        $errores[]="la fecha no es correcta";
    }
    if($_FILES['foto']['name']==""){
        $errores[]="No ha subido ningun archivo";
    }
    
    //SI NO HAY ERRORES EN LAS VALIDACIONES PROCEDEMOS A LA SUBIDA DEL ARCHIVO
    if(!$error){
        //LE DAMOS EL NOMBRE Y EL LUGAR DONDE SE ALMACENARÁ
        $name="foto";
        $dir="imagenes/";
        $resultadoSubida=campoImagen($name, $dir, $usuario, $errores);
        
        //SI LA SUBIDA NOS DEVUELVE FALSE ENTONZES PROCEDEMOS A MOSTRAR DE NUEVO EL FORMULARIO CON ERRORES Y A ESCRIBIR ESTOS ERRORES EN UN FICHERO
        if(!$resultadoSubida){
            $archivo1="usuarios/errores.txt";
            $fails= implode(",", $errores);
            escribeLinea($fails,$archivo1);
            print_r($errores);
            include 'ejercicio_3.php';
        
        //SI LA SUBIDA ES CORRECTA ENTONZES ESCRIBIMOS TODOS LOS DATOS EN UN FICHERO
        }else{
            $fichero="usuarios/usuarios.txt";
            $datos="Nombre: $nombre, Usuario: $usuario, Fecha de alta: ";
            escribeLinea($datos,$fichero);
            header("location:correcto.php");
        }
        //SI ERROR DEVUELVE TRUE ENTONZES PROCEDEMOS A MOSTRAR DE NUEVO EL FORMULARIO CON ERRORES Y A ESCRIBIR ESTOS ERRORES EN UN FICHERO
    }else{
        $archivo1="usuarios/errores.txt";
        $fails= implode(",", $errores);
        escribeLinea($fails,$archivo1);
        print_r($errores);
        include 'ejercicio_3.php';
        
    }
    
}
pie();
?>