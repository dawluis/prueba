<?php
include 'bGeneral.php';
require_once 'conexionDB.php';

cabecera("Alta usuarios");
if(!isset($_REQUEST['enviar'])){
    include 'form.php';
}else{
    $nombre=recoge('nombre');
    $puesto=recoge('puesto');
    $fecha_nacimiento=recoge('fecha_nacimiento');
    $salario=recoge('salario');
    $localidad=recoge('localidad');
    
    if(!cNombre($nombre)){
        $error=true;
    }
    /*if(!validaFecha($fecha)){
     $error=true;
     }*/
    if(!cNum($salario)){
        $error=true;
    }
    if(!cNombre($puesto)){
        $error=true;
    }
    
    
    if(!$error){
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
        
        header('location:bienvenido.php');
        
    }
    
    echo "DATOS INCORRECTOS PORFAVOR VUELVA A INTRODUCIR LOS DATOS";
    include 'form.php';
}



?>