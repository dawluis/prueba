<?php
include 'bGeneral.php';
include 'conexion.php';
$bd= new Modelo();
cabecera("login");
if(!isset($_REQUEST['enviar'])){
    include 'form.php';
    
}else{
    
    $user=$_POST['user'];
    $passwd=$_POST['password'];
    $sql="INSERT INTO usuarios (usuario,password) VALUES ('$user','$passwd')";
    
    $resultado=$bd->exec($sql);
    
    echo $resultado;
    
    
}
pie();
?>
