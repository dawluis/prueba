<?php
include 'bGeneral.php';
include 'conexionDB.php';
cabecera("Alta usuarios");
if(!isset($_REQUEST['enviar'])){
    include 'form.php';
}else{
    $nombre=$_POST['nombre'];
    $puesto=$_POST['puesto'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $salario=$_POST['salario'];
    $localidad=$_POST['localidad'];
    
    $consulta = "INSERT INTO empleados (nombre,puesto,fecha_nacimiento,salario,localidad) VALUES (:nombre, :puesto, :fecha_nacimiento, :salario, :localidad)";
    
    $stm= new modelo();
    $stm->GetInstance();
    $res=$stm->prepare($consulta);
    $res->bindParam(':nombre', $nombre);
    $res->bindParam(':puesto', $puesto);
    $res->bindParam(':fecha_nacimiento',  $fecha_nacimiento);
    $res->bindParam(':salario', $salario);
    $res->bindParam(':localidad', $localidad);
    $re=$res->execute();
    
    var_dump($re);
    
    include 'form.php';
}



?>