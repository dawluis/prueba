<?php
include 'conexionDB.php';

$db= modelo::GetInstance();
$result=$db->getAll();
while($registro= $result->fetch()){
    echo "Id : ".$registro['id']."<br>";
    echo "Nombre : ".$registro['nombre']."<br>";
    echo "Puesto : ".$registro['puesto']."<br>";
    echo "Fecha de Nacimiento : ".$registro['fecha_nacimiento']."<br>";
    echo "Salario : ".$registro['salario']."<br>";
    echo "____________________________________________<br>";
}


?>