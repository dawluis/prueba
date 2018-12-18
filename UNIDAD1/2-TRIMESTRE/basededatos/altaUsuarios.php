
<?php
include 'bGeneral.php';
include 'conexion.php';
cabecera("Alta usuarios");
if(!isset($_REQUEST['enviar'])){
    include 'form.php';
}else{
    
    $consulta = "INSERT INTO empleados (nombre,puesto,fecha_nacimiento,salario,localidad) VALUES ('{$_POST['nombre']}','{$_POST['puesto']}','{$_POST['fecha_nacimiento']}','{$_POST['salario']}',1)";
    
    $count= $db->exec($consulta);
    
    echo $count;
    
    include 'form.php';
}



?>