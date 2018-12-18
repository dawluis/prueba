
<?php
include 'bGeneral.php';
include 'conexionDB.php';
include 'conexion.php';

$result=$db->query("SELECT localidad,id_localidad FROM localidades");

while($registro = $result->fetch()){
    $localidades[$registro['id_localidad']]=$registro['localidad'];
}



/*
$result->execute();
$consulta = "SELECT localidad FROM :localidades";
$result->prepare($consulta);
$result->bindParam(':usuario', $usuario);
$db= modelo::GetInstance();
$stmt= $db->getUsuario($usuario)
*/


$error=false;

cabecera("Alta usuarios");
if(!isset($_REQUEST['enviar'])){
    include 'form.php';
}else{
    $nombre=recoge('nombre');
    $puesto=recoge('puesto');
    $fecha=recoge('fecha_nacimiento');
    $salrio=recoge('salario');
    $localidad=recoge('localidad');
    
    if(!cNombre($nombre)){
        $error=true;
    }
    /*if(!validaFecha($fecha)){
        $error=true;
    }*/
    if(!cNum($salrio)){
        $error=true;
    }
    if(!cNombre($puesto)){
        $error=true;
    }
  
    if(!$error){
        
        foreach ($localidades as $local => $value){
            if($localidad==$value){
                $localidad=$local;
            }
        }
        $consulta = "INSERT INTO empleados (nombre,puesto,fecha_nacimiento,salario,localidad) VALUES ('{$_POST['nombre']}','{$_POST['puesto']}','{$_POST['fecha_nacimiento']}','{$_POST['salario']}','$localidad')";
        $count= $db->exec($consulta); 
        if($count==1){
            header('location: bienvenido.php');
        }
        
    }else{
        include 'form.php';
    }   
   
}



?>