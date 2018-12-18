<?php

include 'bGeneral.php';
include 'conexion.php';
$bd= new Modelo();
cabecera("login");
if(!isset($_REQUEST['enviar'])){
    include 'formRegistro.php';
    
}else{
    $user=$_POST['user'];
    $passwd=$_POST['password'];
    $userAmgio1=$_POST['user_amigo1'];
    $emailAmigo1=$_POST['email_amigo1'];
    $userAmgio2=$_POST['user_amigo2'];
    $emailAmigo2=$_POST['email_amigo2'];
    //$encriptada=crypt_blowfish($passwd);
    //PDO STATEMENT::rowCount();
   
    $user=$_POST['user'];
    $passwd=$_POST['password'];
    $encriptada=crypt_blowfish($passwd);
    try{
    $bd->beginTransaction();
    
    $sql="INSERT INTO usuarios (usuario,password) VALUES (:user, :contrasena)";
    $preparada=$bd->prepare($sql);
    $preparada->bindParam(':user', $user);
    $preparada->bindParam(':contrasena', $encriptada);
    $preparada->execute();
    $ultimoId=$bd->lastInsertId();
    
    $sql1="INSERT INTO amigos (nombre_amigo,email,id_usuario) VALUES (:nombre_amigo, :email, :id_usuario)";
    $preparada1=$bd->prepare($sql1);
    $preparada1->bindParam(':nombre_amigo', $userAmgio1);
    $preparada1->bindParam(':email', $emailAmigo1);
    $preparada1->bindParam(':id_usuario', $ultimoId);
    $preparada1->execute();
    
    $sql2="INSERT INTO amigos (nombre_amigo,email,id_usuario) VALUES (:nombre_amigo, :email, :id_usuario)";
    $preparada2=$bd->prepare($sql2);
    $preparada2->bindParam(':nombre_amigo', $userAmgio2);
    $preparada2->bindParam(':email', $emailAmigo2);
    $preparada2->bindParam(':id_usuario', $ultimoId);
    $preparada2->execute();
    $bd->commit();
    echo "USUARIO Y AMIGOS AÑADIDOS CORRECTAMENTE<br>";
    echo"<a href='login.php'>LOGIN</a>";
    
    }catch (PDOException $e){
        $bd->rollBack();
        include 'formRegistro.php';
        echo "DATOS INCORRECTOS";
    }  
}
pie();
?>
