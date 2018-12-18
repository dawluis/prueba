<?php
require_once 'conexion.php';
session_start();
echo "<h2>BIENVENIDO {$_SESSION['nombre']}</h2><br>
<h3>ESTOS SON TODOS TUS DATOS</h3>";

$db=new Modelo();

echo "LOS DATOS DEL USUARIO<br>";
$resultado=$db->query("SELECT * FROM usuarios WHERE usuario='{$_SESSION['nombre']}'");

while($resul= $resultado->fetch()){
    echo "Usuario: ".$resul['usuario']."<br>";
    echo "Contraseña: ".$resul['password']."<br>";
    echo "Id usuario: ".$resul['id_usuario']."<br>";
}
echo "<br>-----------------------------------------------------<br>";
echo "TODOS LOS DATOS DE TODOS LOS USUARIOS<br>";

$todo=$db->getAll();
while($result=$todo->fetch()){
     echo "<br>Usuario: ".$result['usuario']."<br>";
    echo "Contraseña: ".$result['password']."<br>";
    echo "Id usuario: ".$result['id_usuario']."<br>";
    echo"____________________________________________<br>";
}





?>