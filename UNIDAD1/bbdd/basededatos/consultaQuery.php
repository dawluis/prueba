<?php
include 'conexion.php';


$consulta= "SELECT * FROM empleados";

$result= $db->query($consulta);
// Nos devuelve un objeto PDOStatement
// Podemos recorrerlo como un array aunque no lo es

//var_dump($result);

foreach($result as $row){
    echo "ID: ".$row['id']." <br>";
    echo "NOMBRE: ".$row['nombre']." <br>";
    echo "PUESTO: ".$row['puesto']." <br>";
    echo "FECHA NACIMIENTO: ".$row['fecha_nacimiento']." <br>";
    echo "SALARIO: ".$row['salario']." <br>";
    echo "----------------------- <br>";
}




?>