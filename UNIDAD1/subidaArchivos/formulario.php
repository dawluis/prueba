<?php
include 'bGeneral.php';

$error=false;
$errores=[];

if(isset($_POST['enviar'])){
    
    $nombre=$_REQUEST['nombre'];
    $edad=recoge($_REQUEST['edad']);
    $email=recoge($_REQUEST['email']);
    $foto=recoge($_REQUEST['foto']);
    
    echo $nombre;
    
    if(cTexto($nombre)==0){
        $error=true;
        $errores['nombre']="El nombre no es correcto";
    }
    if(!cNum($edad)==0){
        $error=true;
        $errores['edad']="El edad no es correcto";
    }
    if(!validaEmail($email)==0){
        $error=true;
        $errores['email']="El email no es correcto";
        
    }
    
    if($error){
        
      echo "El nombre es: $nombre";
        
        
        
    }else{
        
        echo "todo perfecto";
        
        
    }
    
    
    
    
    
}else{
    ?>
    <form action="" method="POST">
    <label>Nombre</label><input type="text" name="nombre"><br><br>
    <label>Edad</label><input type="number" name="edad"><br><br>
    <label>Email</label><input type="text" name="email"><br><br>
    <label>Foto</label><input type="file" name="foto"><br><br>
    <input type="submit" value="Enviar" name="enviar">
    </form>
<?php 
}
?>