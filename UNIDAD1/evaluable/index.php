<?php
$error=false;
$errores=[];
include 'bGeneral.php';
cabecera("index");

if(!isset($_REQUEST['enviar'])){
?>
<h2>Mi pagina</h2>
<h3>Alta como usuario</h3>
    <form action="<?=$_SERVER ['PHP_SELF'] //el archivo actual?>" method="POST">
        Tu nombre <br> <input type="text" name="nombre" >
        <br>
        Nombre Usuario <br> <input type="email" name="nombreUsuario" >
        <br>
        Contraseña <br> <input type="email" name="contrasena" >
        <br>
        Fecha de nacimiento <br> <input type="date" name="fecha" >
        <br>
        foto de perfil <br> <input type="file">
        <br> <br>
        <input type="submit" name="enviar">
    </form>
 <?php 
}else{
    $nombre=sinEspacios(recoge($_REQUEST['nombre']));
    $nombreUsuario=sinEspacios(recoge($_REQUEST['nombreUsuario']));
    $contrasena=sinEspacios(recoge($_REQUEST['contrasena']));
    $fechaNacimiento=sinEspacios(recoge($_REQUEST['fecha']));
    
    if(empty($nombre)||!cTexto($nombre)){
        $error=true;
        $errores['nombre']="El nombre no es correcto";
    }
    if(empty($nombreUsuario)){
        $error=true;
        $errores['nombreUsuario']="El nombre de usuario no es correcto";
        
    }
    if(empty($contrasena)){
        $error=true;
        $errores['contrasena']="El contraseña no es correcto";
    }
    if(empty($fechaNacimiento)){
        $error=true;
        $errores['fecha']="El contraseña no es correcto";
        
    }
    
    
    
    
    
}
 
 ?>   

</body>
</html>
